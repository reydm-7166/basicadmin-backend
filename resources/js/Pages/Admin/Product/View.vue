<template>
  <Head :title="product.name"/>
  <Sidebar></Sidebar>
  <main class="min-h-screen h-fit flex justify-center ms-[60px] items-center bg-gray-500">

    <section id="container" class="ms-[40px] md:ms-[100px] lg:ms-[100px] xl:w-[1000px] md:w-[950px] lg:w-[950px] h-[500px] flex flex-col md:flex-row lg:flex-row">
      <div id="logo" class="h-full md:w-[50%] lg:w-[50%] rounded-t-[30px] lg:rounded-l-[30px] md:rounded-l-[30px] lg:rounded-t-[0px] md:rounded-t-[0px]">
        <img alt=""
             class="h-full w-full object-fit rounded-t-[30px] lg:rounded-l-[30px] md:rounded-l-[30px] lg:rounded-tl-[30px] md:rounded-t-[0px]"
             :src="`/images/${firstImage}`"
        >
      </div>
      <div id="form" class="bg-white h-full  w-full md:w-[50%] lg:w-[50%] flex flex-col justify-start md:rounded-r-[30px] lg:rounded-r-[30px] py-5 px-5">
        <form action="" method="post">
          <div id="title" class="mt-[30px]  h-28 flex items-end flex justify-between">
            <p
                class="text-base main-font tracking-widest font-medium"
            >{{ (product.category).toUpperCase() }}</p>

          </div>
          <div id="name" class="mt-[10px] h-fit min-h-16 flex items-start">
            <p class="text-4xl main-font tracking-wide font-bold">{{ (product.name) }}</p>

          </div>
          <div id="price" class="mt-[20px] md:mt-[20px] lg:mt-[10px] h-8 flex items-start">
            <p class="text-base text-green-500 main-font tracking-wide font-bold"> $420.00 </p>
          </div>
          <div id="name" class="mt-[30px] h-28 flex items-start">
            <p class="text-base main-font tracking-wide">{{ (product.description) }}</p>
          </div>
        </form>
      </div>

    </section>
  </main>
</template>

<script setup>
  import { Head } from '@inertiajs/vue3'
  import Sidebar from "@/Pages/Template/Sidebar.vue";
  import {defineProps, ref} from "vue";


  const props = defineProps({
    product: {
      type: Object,
      required: true,
    },
  });

  let imageContainer = JSON.parse(props.product.image_file_name)

  let firstImage = checkFirstImageInContainer(imageContainer)

  function checkFirstImageInContainer(image)
  {
    if(image)
    {
      return image[0]
    }
    return 'no-image.png';
  }

  let showForms = ref(false)

  function showHideForms() {
    if(showForms.value == false)
    {
      showForms.value = true
    }
    else
    {
      showForms.value = false
    }

  }

</script>