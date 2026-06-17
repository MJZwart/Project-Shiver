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
</script>
