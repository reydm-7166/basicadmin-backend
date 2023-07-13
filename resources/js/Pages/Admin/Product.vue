<template>
  <section id="product-container" class="w-full bg-[#EAEAEA] min-h-screen h-fit flex flex-col items-center justify-start">
    <div id="sort-section" class="mt-3 w-[60%] h-12 px-20 pb-2 flex justify-between items-end  rounded-[20px]">
      <p>Admin / Products / All</p>
      <div id="search-and-sort" class="flex items-end">
        <div id="search" class=" mx-3">
          <input
              class="shadow appearance-none border rounded w-full py-[7px] px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
              id="username" type="text"
              v-model="search"
              placeholder="Search ...">
        </div>
        <SortDropDown :categories="props.categories">

        </SortDropDown>
      </div>


    </div>
    <main id="content" class="w-[60%] rounded-[10px] h-full min-h-fit py-3 px-20">
      <div class="grid grid-cols-3 gap-4">
        <div
            class="element bg-[#FFFFFF] shadow-lg rounded-[10px] h-full hover:border hover:border-sky-500 hover:cursor-pointer hover:transform hover:scale-105 transition-all duration-200 overflow-hidden"
            v-for="product in props.products.data">
          <div id="img" class="bg-white h-[55%] rounded-t-[10px]">
            <img :src="product.url"
                 alt=""
                  class="h-full m-auto w-[75%]">
          </div>
          <div id="item-details" class="bg-[#F5F5F5] h-[45%] rounded-b-[10px] px-3 flex flex-col">
            <p class="mt-4 font-bold tracking-wider main-font hover:underline underline-offset-4 hover:text-blue-500">{{ product.name }}</p>
            <p class="font-normal text-sm text-[#8c8989]">{{ product.category }}</p>
            <p class="mt-4 truncate ">{{ product.description }}</p>
            <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full mt-8">View</button>
          </div>
        </div>
      </div>


      <div id="pagination" class="w-full text-center mt-8">
        <nav class="isolate inline-flex -space-x-px rounded-md shadow-sm" aria-label="Pagination">
          <template v-for="link in products.links">
            <Link
                v-if="link.url"
                :href="link.url"
                v-html="link.label"
                class="relative inline-flex items-center px-4 py-2 text-base font-semibold text-gray-900 ring-1 ring-inset ring-gray-300 hover:bg-gray-50 focus:z-20 focus:outline-offset-0"
                :class="{
                  'bg-indigo-600 focus:z-20 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600' : link.active
                }"
            />
            <Link v-else
                  v-html="link.label"
                  class="relative inline-flex items-center px-2 py-2 text-gray-400 ring-1 ring-inset ring-gray-300 hover:bg-gray-50 focus:z-20 focus:outline-offset-0"
                  :class="{
                    'rounded-r-md' : checkifRightorLeft(link.label),
                    'rounded-l-md' : !checkifRightorLeft(link.label)
                  }"
            />
          </template>
        </nav>
      </div>
    </main>
  </section>
</template>
<style scope>

</style>
<script setup>
  import SortDropDown from "@/Pages/Template/SortDropDown.vue";
  import { defineProps } from "vue";
  import { Link, router } from '@inertiajs/vue3'
  import { ref, watch } from 'vue'

  const props = defineProps({
      products: {
        type: Object,
        required: true,
      },
      categories: {
        type: Object,
      }
  })

  let search = ref('');
  let sort = ref('');
  watch (search, value => {
    router.visit('/admin/product', {
      method: 'get',
      data: {
        search: value,
      },
      preserveState: true,
    })
  })

  function checkifRightorLeft(side)
  {
    if(side == 'Next &raquo;')
    {
      return true;
    }
    return false;
  }


</script>
