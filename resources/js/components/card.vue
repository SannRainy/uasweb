<template lang="html">
    <div @mouseover="hover = true" @mouseleave="hover = false" class="relative">
      <!-- Menampilkan gambar atau video tergantung tipe media -->
      <img v-if="mediaType === 'image'" :src="src" alt="Card Media" class="rounded-lg w-full" />
      <video v-else-if="mediaType === 'video'" :src="src" class="rounded-lg w-full" autoplay muted loop />

      <div v-if="hover" class="absolute bg-dark opacity-50 inset-0 w-full h-full rounded-lg"></div>

      <div v-if="hover" class="absolute top-0 w-full h-full flex flex-col justify-between p-3">
        <div class="flex items-center justify-between">
          <button type="button" class="flex items-center">
            <p class="font-semibold text-white"> {{ board }} </p>
            <span class="material-icons text-white">expand_more</span>
          </button>
          <button type="button" class="rounded-full py-3 px-5 text-white bg-primary font-semibold">
            Save
          </button>
        </div>
        <div class="flex items-center w-full">
          <button type="button" class="ml-auto mr-2 bg-white rounded-full w-8 h-8 flex items-center justify-center text-sm text-dark opacity-75 hover:opacity-100">
            <span class="material-icons text-base">ios_share</span>
          </button>
          <button type="button" class="bg-white rounded-full w-8 h-8 flex items-center justify-center text-dark opacity-75 hover:opacity-100">
            <span class="material-icons text-base">more_horiz</span>
          </button>
        </div>
      </div>
    </div>
  </template>

  <script>
  export default {
    props: ['src', 'board', 'mediaType'],
    data() {
      return {
        hover: false  // Hover state untuk efek tampilan
      };
    }
  }
</script>

  <style lang="css" scoped>
  </style>
