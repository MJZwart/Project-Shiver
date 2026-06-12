<template>
  <NavBar />
  <div>
    <router-view />
  </div>
</template>

<script setup lang="ts">
import NavBar from './components/NavBar.vue';
import NumberGoUp from './components/NumberGoUp.vue';

</script>
