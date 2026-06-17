<template>
  <NavBar />
  <div>
    <router-view />
  </div>
</template>

<script setup lang="ts">
import { onBeforeMount } from 'vue';
import NavBar from './components/NavBar.vue';
import { me } from './auth/auth.ts';

onBeforeMount(() => {
  me()
});

// TODO Made a /me that calls whenever you reload on onMounted or something to check if the user is logged in and if so, send it.
// Then test all the usual suspects, 
// Create a logout button as well

</script>
