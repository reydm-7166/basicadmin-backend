<template>
  <Head title="Create Product"/>
  <div id="form" class="bg-[#C1CBDC] w-full min-h-screen h-fit flex flex-row justify-center pt-[50px]">
    <div id="form-container" class="w-[40%] bg-white rounded-lg p-[15px]">
      <h1 class="text-center text-2xl main-font font-bold">Add Product</h1>
      <form @submit.prevent="submit" class="mx-[30px] my-[50px]" >
        <div class="space-y-12">
          <div class="border-b border-gray-900/10 pb-12">
            <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
<!--              product name-->
              <div class="sm:col-span-3">
                <label for="first-name" class="block text-sm font-medium leading-6 text-gray-900">Product Name</label>
                <div class="mt-2">
                  <input type="text" name="first-name"
                         v-model="form.name"
                         id="first-name"
                         class="px-2 block w-full rounded-md py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400
                         focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                         :class="{
                           'border border-red-500': errors.name
                         }"
                         placeholder="Name"
                  />
                  <small v-if="errors.name" v-text="errors.name" class="text-red-500 italic main-font font-bold"></small>
                </div>

              </div>

<!--category-->
              <div class="sm:col-span-3">
                <label for="country" class="block text-sm font-medium leading-6 text-gray-900">Category</label>
                <div class="mt-2">
                  <select id="country"
                          name="country"
                          autocomplete="country-name"
                          v-model="form.category"
                          class="px-2 block border w-full rounded-md py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset
                          focus:ring-indigo-600 sm:max-w-xs sm:text-sm sm:leading-6"
                          :class="{
                           'border-red-500': errors.category
                         }">
                    <option>United States</option>
                    <option>Canada</option>
                    <option>Mexico</option>
                  </select>
                  <small v-if="errors.category" v-text="errors.category" class="text-red-500 italic main-font font-bold"></small>
                </div>
              </div>
<!--picture-->
              <div class="col-span-full">
                <label for="cover-photo" class="block text-sm font-medium leading-6 text-gray-900">Product Photo</label>
                <div
                    class="mt-2 flex justify-center rounded-lg border border-dashed border-gray-900/25 px-6 py-10"
                    :class="{
                       'border-red-500': errors.image
                    }"
                >
                  <div class="text-center">
                    <PhotoIcon class="mx-auto h-12 w-12 text-gray-300" aria-hidden="true" />
                    <div class="mt-4 flex text-sm leading-6 text-gray-600">
                      <label for="file-upload" class="relative cursor-pointer rounded-md bg-white font-semibold text-indigo-600 focus-within:outline-none focus-within:ring-2 focus-within:ring-indigo-600 focus-within:ring-offset-2 hover:text-indigo-500">
                        <span class="p-5">Upload a file</span>
                        <input
                            id="file-upload"
                            name="file-upload"

                            :multiple="true"
                            type="file"
                            accept="image/*"
                            @input="form.image = $event.target.files"
                            class="sr-only" />
                      </label>
                      <p class="pl-1">or drag and drop</p>
                    </div>
                    <p class="text-xs leading-5 text-gray-600">PNG, JPG, GIF up to 10MB</p>
                  </div>
                </div>
                <small v-if="errors.image" v-text="errors.image" class="text-red-500 italic main-font font-bold"></small>
              </div>
<!--datetime-->
              <div class="col-span-full">
                <label for="cover-photo" class="block text-sm font-medium leading-6 text-gray-900">Date and Time</label>
                <div class="mt-2">
                  <VueDatePicker v-model="form.date_time"></VueDatePicker>
                </div>
                <small v-if="errors.date_time" v-text="errors.date_time" class="text-red-500 italic main-font font-bold"></small>
              </div>

              <div class="col-span-full">
                <div class="max-w-2xl mx-auto">

                  <label for="message" class="block mb-2 text-sm font-medium text-dark">Product Description</label>
                  <textarea
                      id="message" rows="4"
                      :class="{
                         'border border-red-500': errors.description
                       }"
                      v-model="form.description"
                      class="block p-2.5 w-full text-sm text-dark rounded-lg border border-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600"
                      placeholder="Description ...."></textarea>
                </div>
                <small v-if="errors.description" v-text="errors.description" class="text-red-500 italic main-font font-bold"></small>
              </div>

            </div>
          </div>

        </div>

        <div class="mt-6 flex items-center justify-end gap-x-6">
          <button type="button" class="px-10 text-sm font-semibold leading-6 text-gray-900"><Link :href="route('product.index')">Cancel</Link></button>
          <button type="submit"
                  class="px-10 rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Save</button>
        </div>
      </form>
    </div>
  </div>

</template>

<script setup>
import { PhotoIcon, UserCircleIcon } from '@heroicons/vue/24/solid'
import { ref } from 'vue';
import VueDatePicker from '@vuepic/vue-datepicker';
import '@vuepic/vue-datepicker/dist/main.css'
import { router, useForm } from '@inertiajs/vue3'

defineProps({
  errors: Object,
})

const form = useForm({
  name: null,
  category: null,
  description: null,
  date_time: null,
  image: null,
})

function submit() {
  form.post(route('product.store'), {
    preserveScroll: true,
    onSuccess: () => console.log("uploaded"),
  })
}


const date = ref();
</script>