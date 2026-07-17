<template>
  <NavBar />
  <div>
    <router-view />
  </div>
  <ShitpostFooter />
</template>

<script setup lang="ts">
import { onMounted } from 'vue';
import NavBar from './components/NavBar.vue';
import { me } from './auth/auth.ts';
import ShitpostFooter from './components/ShitpostFooter.vue';

onMounted(() => {
  me();
});
</script>
