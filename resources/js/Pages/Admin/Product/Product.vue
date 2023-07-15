<template>
  <Head title="Products"></Head>
  <Sidebar/>
  <div id="container"
       class="bg-[#C1CBDC] w-full mx-auto min-h-screen h-fit flex flex-col items-center">
    <div
        class="w-2/3 md:ms-[115px] lg:ms-[115px]"
        >
      <div id="title"
           class="mx-auto w-2/3 text-center h-14 mt-[10px] flex flex-col justify-center"
      >
        <h1 class="text-black text-2xl oswalo-font font-bold">Products</h1>
      </div>

      <div id="sort-section" class="mt-3 w-full h-12 px-2 flex flex-row">
        <div id="search" class="w-full flex items-center justify-end">
          <button
              class="mx-5 text-2xl text-blue-500 hover:text-blue-700"
              data-te-toggle="tooltip"
              title="Add new product"
          >
            <Link :href="route('product.create')"><i class="fa-solid fa-plus"></i></Link >
          </button>
          <input
              class="h-10 w-[30%] shadow appearance-none border rounded px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
              id="username" type="text"
              v-model="search"
              placeholder="Search ...">
        </div>

      </div>

      <div id="table-container"
           class="h-[800px] p-2 mx-auto w-full rounded-[10px]"
           :class="{
              'bg-opacity-50 bg-black backdrop-filter backdrop-blur-lg': isOpen
           }"

      >
          <!-- component -->
          <div class="overflow-x-auto rounded-[10px]">
            <div class="min-w-screen min-h-fit bg-gray-100 flex flex-col bg-gray-100 font-sans overflow-hidden">
              <div class="w-full">
                <div class="bg-white shadow-md rounded my-6">
                  <table class="min-w-max w-full table-auto">
                    <thead>
                    <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                      <th class="py-3 px-6 text-left">ID</th>
                      <th class="py-3 px-6 text-left">Name</th>
                      <th class="py-3 px-6 text-center">Category</th>
                      <th class="py-3 px-6 text-center">Description</th>
                      <th class="py-3 px-6 text-center">Last edited</th>
                      <th class="py-3 px-6 text-center">Actions</th>
                    </tr>
                    </thead>
                    <tbody class="text-gray-600 text-sm font-light">
<!--                    v-for here -->
                    <tr
                        class="border-b border-gray-200 hover:bg-gray-100"
                        v-for="product in products.data"
                        :key="product.id"
                    >
                      <td class="py-3 px-6 text-left whitespace-nowrap">
                        <div class="flex items-center">
                          <span class="font-medium">{{ product.id }}</span>
                        </div>
                      </td>
                      <td class="py-3 px-6 text-left">
                        <div class="flex items-center">
                          <div class="mr-2">
                            <img class="w-6 h-6 rounded-full" :src="product.url"/>
                          </div>
                          <span>{{ product.name }}</span>
                        </div>
                      </td>
                      <td class="py-3 px-6 text-center">
                        <div class="flex items-center justify-center">
                          {{ product.category }}
                        </div>
                      </td>
                      <td class="py-3 px-6 text-start truncate">
                        <span class="y-1 px-3 rounded-full text-xs">{{ product.description }}</span>
                      </td>
                      <td class="py-3 px-6 text-center">
                        <span
                            class="bg-purple-200 text-purple-600 py-1 px-3 rounded-full text-xs"
                        >
                          {{ convertToReadableUpdatedAtDate(product.updated_at) }}
                        </span>
                      </td>
                      <td class="py-3 px-6 text-center">
                        <div class="flex item-center justify-center">
                          <Link
                              class="w-4 mr-2 transform hover:text-purple-500 hover:scale-110"
                              :href="route('product.show', product.id)"
                          >
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                            </svg>
                          </Link>
                          <div
                              class="w-4 mr-2 transform hover:text-purple-500 hover:scale-110 hover:cursor-pointer"
                              @click="openModal(product.id)"
                          >
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                            </svg>
                          </div>
                          <div
                              class="w-4 mr-2 transform hover:text-red-500 hover:scale-110 hover:cursor-pointer"
                              @click="openDeleteModal(product.id)"
                          >
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                            </svg>
                          </div>
                        </div>
                      </td>
                    </tr>
                    </tbody>
                  </table>
                </div>
              </div>
              <div id="pagination" class="w-full text-center mt-8 mb-8">

                <Pagination :links="products.links">

                </Pagination>
              </div>
            </div>
          </div>
      </div>
    </div>

  </div>


</template>
<style scoped>
.text-white {
  color: #ffffff !important;
}
</style>
<script setup>
  import Pagination from "@/Pages/Template/Pagination.vue"
  import Sidebar from "@/Pages/Template/Sidebar.vue";
  import {defineProps, ref, watch} from "vue";
  import moment from 'moment';
  import {Link, router, usePage} from '@inertiajs/vue3'

  const page = usePage();
  let props = defineProps({
    products: {
      type: Object,
      required: true,
    },
    search: {
      type: String,
    },
    attrs: {
      type: Object,
    },
  });
  let search = ref(props.search);
  let deleted = ref(usePage().props.flash.delete);

  watch (search, value => {
    router.visit(route('product.index'), {
      method: 'get',
      data: {
        search: value,
      },
      preserveState: true,
      preserveScroll: true,
    })
  })

  if (page.props.flash.create == 'true') {
    productCreatedNotification();
  }
  function productCreatedNotification()
  {
    Swal.fire({
      icon: 'success',
      title: 'Product Created',
      toast: true,
      position: 'top-end',
      showConfirmButton: false,
      timer: 4000,
      timerProgressBar: true,
      background: '#4caf50',
      iconColor: 'white',
      showClass: {
        popup: 'swal2-noanimation',
        backdrop: 'swal2-noanimation'
      },
      hideClass: {
        popup: '',
        backdrop: ''
      }
    });
  }
  function convertToReadableUpdatedAtDate(date)
  {
    return moment(date).startOf('hour').fromNow();
  }

  function openDeleteModal(id)
  {
    Swal.fire({
      icon: 'question',
      title: 'Are you sure?',
      showCancelButton: true,
      confirmButtonText: 'Yes',
      cancelButtonText: 'No',
      customClass: {
        confirmButton: 'px-6 mx-2 bg-green-500 hover:bg-green-600 text-white py-2 rounded',
        cancelButton: 'px-6 mx-2 bg-red-500 hover:bg-red-600 text-white py-2 rounded',
      },
      buttonsStyling: false,
    }).then((result) => {
      if (result.isConfirmed) {

        deleteProduct(id);

      } else if (result.dismiss === Swal.DismissReason.cancel) {
        // User clicked "No" or "Close" buttons
        // Handle close event
      }
    });
  }

  function deleteProduct(id)
  {
    router.delete(route('product.destroy', id), {
      preserveState: true,
      preserveScroll: true,
    })
    if(page.props.flash.delete == 'true')
    {
      Swal.fire({
        icon: 'success',
        title: 'Record Deleted',
        position: 'top-end',
        toast: true,
        showConfirmButton: false,
        timer: 4000,
        timerProgressBar: true,
        customClass: {
          title: 'text-white', // Custom CSS class for the title
          icon: 'swal2-icon-error', // Use "swal2-icon-success" for a green checkmark icon
        },
        background: '#f44336', // Red background color
        iconColor: '#ffffff', // White icon color
      });
    }
  }



</script>
