<template>
  <Sidebar/>
  <Head title="Dashboard"></Head>
  <div id="main"
       class="ms-[100px] xl:ps-[200px] h-fit min-h-screen p-1"
  >
    <div id="title" class="w-full text-center">
      <h1>At dashboard</h1>
    </div>
    <div id="top-charts" class="w-full p-1 mt-5 flex bg-white flex-wrap justify-center">
        <div id="chart1" class="bg-gray-500/75 h-48 w-[350px] mx-2 my-1 rounded-lg p-3">
          <h1 class="text-2xl mt-5 main-font font-bold">Products</h1>
          <div id="total" class="h-[50%] flex justify-between items-end p-5">
            <p class="text-4xl opacity-25"><i class="fa-solid fa-cart-shopping"></i></p>
            <h1 class="text-4xl"> {{ products }}</h1>
          </div>
        </div>
      <div id="chart1" class="bg-blue-500/75 h-48 w-[350px] mx-2 my-1 rounded-lg p-3">
        <h1 class="text-2xl mt-5 main-font font-bold">Users</h1>
        <div id="total" class=" h-[50%] flex justify-between items-end p-5">
          <p class="text-4xl opacity-25"><i class="fa-solid fa-users"></i></p>
          <h1 class="text-4xl"> {{ users }}</h1>
        </div>
      </div>
      <div id="chart1" class="bg-yellow-500/75 h-48 w-[350px] mx-2 my-1 rounded-lg p-3">
        <h1 class="text-2xl mt-5 main-font font-bold">Categories</h1>
        <div id="total" class=" h-[50%] flex justify-between items-end p-5">
          <p class="text-4xl opacity-25"><i class="fa-solid fa-filter"></i></p>
          <h1 class="text-4xl"> {{ categories }}</h1>
        </div>
      </div>
      <div id="chart1" class="bg-red-500/75 h-48 w-[350px] mx-2 my-1 rounded-lg p-3">
        <h1 class="text-2xl mt-5 main-font font-bold">Dummy </h1>
        <div id="total" class="h-[50%] flex justify-between items-end p-5">
          <p class="text-4xl opacity-25"><i class="fa-solid fa-star"></i></p>
          <h1 class="text-4xl"> 99999</h1>
        </div>
      </div>
    </div>

    <div id="bottom-charts" class="w-full h-fit min-h-[600px] p-1 mt-10 flex flex-wrap justify-center items-center">

      <div id="chart1" class="bg-blue-100 h-96 w-[350px] md:w-[450px] xl:w-[650px] mx-2 my-1 rounded-lg">
        <Bar :data="data" :options="options" />
      </div>
      <div id="chart2" class="bg-blue-100 h-96 w-[350px] md:w-[450px] xl:w-[650px] mx-2 my-1 rounded-lg">
        <Bar :data="data" :options="options" />
      </div>
    </div>

  </div>



</template>
<script setup>
  import { Bar } from 'vue-chartjs'
  import {
    Chart as ChartJS,
    Title,
    Tooltip,
    Legend,
    BarElement,
    CategoryScale,
    LinearScale
  } from 'chart.js'

  import Sidebar from "@/Pages/Template/Sidebar.vue";
  import {defineProps, ref} from "vue";

  let props = defineProps({
    products: {
      type: Number,
    },
    users: {
      type: Number,
    },
    categories: {
      type: Number,
    },
  });

  let data = {
    labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
    datasets: [
      {
        label: 'Data One',
        backgroundColor: '#f87979',
        data: [40, 39, 10, 40, 39, 80, 40]
      }
    ]
  }

  let options = {
    responsive: true,
    maintainAspectRatio: false
  }



  ChartJS.register(CategoryScale, LinearScale, BarElement, Title, Tooltip, Legend)

</script>