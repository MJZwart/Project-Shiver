<template>
  <NavBar />
  <div>
    <router-view />
  </div>
</template>

<script setup lang="ts">
import { onBeforeMount, onMounted } from 'vue';
import NavBar from './components/NavBar.vue';
import { me } from './auth/auth.ts';
import { useRoute } from 'vue-router';

const route = useRoute();

onMounted(async () => {
  await me();
  console.log(route.path)
});
</script>
