<template>
    
    <div class="font-sans">
         <nav class="border-b border-gray-200 bg-gray-200">
        <div class="container mx-auto flex items-center justify-between px-4 py-6">
            <ul class="flex items-center mt-4">
                <li>
                   <a href="" class="bg-white rounded-md w-45 px-6 pl-10 py-4 text-black-200 text-xl">Live & Upcoming</a> 
                </li>
                <li class="ml-1">
                    <a href="" class="bg-green-700 rounded-md w-45 px-6 pl-10 py-4 text-white font-semibold">Result</a> 
                 </li>
                 <li class="ml-1">
                    <a href="" class="bg-green-700 rounded-md w-45 px-6 pl-10 py-4 text-white font-semibold">Calender</a> 
                 </li>
            </ul>

        </div>
    </nav>
    <div class=" mx-auto px-12 pt-16 mt-4" v-for="list in matchList" :key="list">
    
<div class="grid grid-cols-7 gap-4 border-b border-solid border-gray-400 py-6">
    <div class="ml-4">
        <span class="text-xl text-white font-semibold rounded-md bg-green-700 px-3 py-2 mt-2 items-center"> {{list.competition.status}} </span>
        <span class="text-xl text-black-500 font-semibold">{{ list.subtitle}}</span>
    
    <div class="mt-3 ml-2 text-orange-600">
        <h3>{{list.venue.name}}</h3>
        <h3>{{list.venue.location}}</h3>
        <h3>{{list.venue.timezone}}</h3>
    </div>
    </div>
    <div class="ml-2 font-bold text-4xl text-gray-800">
        <h2 class="font-bold text-4xl text-gray-800">{{list.teama.name}}</h2>
        <h2 class="font-semibold text-lg text-gray-800"> {{ list.teama.scores_full}}</h2>
    </div>
    <div class="mt-2"> 
       <img :src="list.teama.logo_url" alt="" class="rounded-md h-12 w-12">
    </div>
    <div class="ml-4 font-bold text-5xl text-orange-600">
        <h2>VS</h2>
    </div>
    <div class="ml-4 mt-2">
         <img :src="list.teamb.logo_url" alt="" class="rounded-md h-12 w-12">
    </div>
    <div class="ml-4">
        <div class="mr-2">
             <h2 class="font-bold text-4xl text-gray-800">{{list.teamb.name}}</h2>
            <h2> {{ list.teama.scores_full}}</h2>
        </div>
        </div>
        <div class="ml-2 mt-4">
            <h2 class="text-orange-600 font-semibold">{{list.date_start}} </h2>
        </div>

</div>

</div>
    </div>


</template>

<script>
    export default {
        mounted() {
            this.fetchData()
        },
        data(){
         return{
             matchList:[],
        }
         },
        methods:{
            fetchData(){
                fetch('/api/match')
                .then(response =>response.json())
                .then(data => {
                    console.log(data)
                   this.matchList=data
                })
            }
        },

    }
</script>
