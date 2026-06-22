<template>
  <NavBar />
  <div>
    <router-view />
  </div>
</template>

<script setup lang="ts">
import { onMounted } from 'vue';
import NavBar from './components/NavBar.vue';
import { me } from './auth/auth.ts';

onMounted(() => {
  me();
});
</script>
