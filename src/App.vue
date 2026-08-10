<template>
  <NavBar />
  <div>
    <router-view />
  </div>
  <ErrorFooter />
</template>

<script setup lang="ts">
import { onMounted } from 'vue';
import NavBar from './components/NavBar.vue';
import { me } from './auth/auth.ts';
import ErrorFooter from './components/errors/ErrorFooter.vue';

onMounted(() => {
  me();
});
</script>
