<template>
  <Head title="Login"/>
  <main class="h-screen flex justify-center items-center bg-gray-500">
    <section id="container" class="w-[65%] h-[700px] rounded-[30px] flex flex-row">
      <div id="logo" class="bg-blue-500 h-full w-[50%] rounded-l-[30px]">
        testasdas
      </div>
      <div id="form" class="bg-white h-full w-[50%] flex flex-col justify-center items-center rounded-r-[30px]">
        <div id="title" class="w-full h-36 flex justify-center items-end text-4xl pb-4 main-font">
          Admin Login
        </div>
        <div class="w-full flex justify-center">
          <form class="w-[80%] rounded px-8 pt-6 pb-8 mb-4">
            <div class="mb-4">
              <label class="block text-gray-700 text-base mb-2 main-font font-bold" for="username">
                Username or Email
              </label>
              <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="username" type="text" placeholder="Username">
            </div>
            <div class="mb-3">
              <label class="block text-gray-700 text-base text-sm font-bold mb-2 main-font " for="password">
                Password
              </label>
              <input class="shadow appearance-none rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline" id="password" type="password" placeholder="******************">
            </div>
            <div class="mb-6">
              <label for="remember" class="inline-flex items-center text-white">
                <input
                    id="remember"
                    type="checkbox"
                    class="form-checkbox h-4 w-4 text-green-500"
                />
                <span class="ml-2 text-black">Remember Me</span>
              </label>
            </div>
            <div class="w-full flex items-center bg-yellow-500">
              <button class="w-full bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="button">
                Log In
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

</script>