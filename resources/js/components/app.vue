<template lang="html">
    <div class="">
      <TopNav />
      <div class="px-20 w-full flex flex-wrap">
        <div v-for="(arr, index) in subArrays" :key="index" class="w-1/5">
          <div v-for="(card, i) in arr" :key="i" class="w-full">
            <div class="w-full p-2">
              <!-- Komponen Card dengan media dinamis -->
              <Card
                :src="`${card.media_url}`"
                :board="card.recommended"
                :mediaType="card.media_type"
                class="w-full h-full"
              />
              <div class="text-sm leading-tight pt-2">
                <p class="font-bold"> {{ card.title }} </p>
                <p> {{ card.user }} </p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </template>

  <script>
  import axios from 'axios';
  import TopNav from './TopNav.vue';
  import Card from './card.vue';

  export default {
    name: 'App',
    components: {
      TopNav,
      Card
    },
    data() {
      return {
        cards: []  // Menyimpan data cards dari API
      };
    },
    computed: {
      subArrays() {
        var length = Math.ceil(this.cards.length / 5);
        const result = new Array(length)
          .fill()
          .map(() => this.cards.splice(0, length));
        return result;
      }
    },
    mounted() {
      // Mengambil data dari API (Gantilah URL sesuai dengan API kamu)
      axios.get('http://localhost:8000/api/cards')
        .then(response => {
          this.cards = response.data;  // Menyimpan data ke cards
        })
        .catch(error => {
          console.error('Error fetching cards:', error);
        });
    }
  }
  </script>

<style src="../../css/app.css" />

