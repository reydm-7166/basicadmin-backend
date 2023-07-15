<template>
  <Head title="Login"/>

  <main class="min-h-screen h-fit flex justify-center items-center bg-gray-500">
    <section id="container"
             class="min-h-[400px] h-fit sm:h-fit md:h-[600px] lg:h-[600px] xl:h-[600px] p-2 w-[450px] sm:w-[550px] md:w-[800px] lg:w-[1200px]
             xl:w-[1200px] h-[700px] rounded-[30px] flex flex-col md:flex-row lg:flex-row xl:flex-row sm:flex-col">

      <div id="logo"
           class="bg-blue-500 w-full md:w-[50%] lg:w-[50%] xl:w-[50%] sm:w-full rounded-t-[30px]
            lg:rounded-l-[30px] md:rounded-l-[30px] xl:rounded-l-[30px]
            lg:rounded-r-[00px] md:rounded-r-[0px] xl:rounded-r-[0px]
            ">
        <div class="w-full h-full flex justify-center items-center sm:rounded-l-[30px]">
          <img src="/images/logo.png" alt="logo" class="object-fit w-full h-[50%]">
        </div>
      </div>

      <div id="form"
           class="bg-white h- w-full h-full md:w-[50%] lg:w-[50%] xl:w-[50%] w-full h-full md:h-full lg:h-full xl:h-full rounded-b-[30px] xl:rounded-r-[30px]
           lg:rounded-r-[30px] md:rounded-r-[30px] xl:rounded-l-[0px]
           lg:rounded-l-[0px] md:rounded-l-[0px] flex flex-col justify-center items-center">
        <div id="title" class="w-full h-36 flex flex-col justify-end items-center text-4xl pb-4 main-font">
          <p class="text-red-500 text-sm my-3 font-bold italic" v-if="errors.credentials_error"><i class="text-base fa-solid fa-triangle-exclamation"></i> {{
              errors.credentials_error }}</p>
          <p class="main-font font-bold">Login</p>
        </div>
        <div class="w-full flex justify-center">
          <form class="w-[80%] rounded px-8 pt-6 pb-8 mb-4">
            <div class="mb-2 h-24">
              <label class="block text-gray-700 text-base mb-2 main-font font-bold" for="username">
                Username or Email
              </label>
              <input
                  class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                  id="username" type="text" placeholder="Username"
                  v-model="form.user"
                  :class="{
                     'border border-red-500': errors.user
                  }"
              >
              <small v-if="errors.user" v-text="errors.user" class="text-red-500 italic main-font font-bold"></small>
            </div>
            <div class="mb-2 h-24">
              <label class="block text-gray-700 text-base text-sm font-bold mb-2 main-font " for="password">
                Password
              </label>
              <input
                  class="shadow appearance-none rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline"
                  id="password" type="password"
                  v-model="form.password"
                  :class="{
                     'border border-red-500': errors.password
                  }"
                  placeholder="******************">
              <small v-if="errors.password" v-text="errors.password" class="text-red-500 italic main-font font-bold"></small>
            </div>
            <div class="mb-6">
              <label for="remember" class="inline-flex items-center text-white">
                <input
                    id="remember"
                    type="checkbox"
                    v-model="form.remember"
                    class="form-checkbox h-4 w-4 text-green-500"
                />
                <span class="ml-2 text-black">Remember Me</span>
              </label>
            </div>
            <div class="w-full flex items-center bg-yellow-500">
              <button
                  class="w-full bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
                  @click="submit"
                  type="button">
                Continue
              </button>
            </div>
          </form>
        </div>


      </div>
    </section>
  </main>

</template>

<script setup>
  import { Head } from '@inertiajs/vue3'
  import { router, useForm } from '@inertiajs/vue3'
  import { defineProps } from 'vue'

  const props = defineProps({
    errors: Object,
  })

  const form = useForm({
    user: null,
    password: null,
    remember: false,
  })

  function submit() {
    form.post(route('login.attempt'), {
      preserveScroll: true,
      preserveState: true,
    })
  }


</script>