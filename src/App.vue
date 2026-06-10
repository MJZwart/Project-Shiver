<template>
  <div flex flex-col items-center>
    <span font-700 text-size-3xl mb-2>{{ number }}</span>
    <button @click="numberGoUp">Number go up</button>
  </div>
</template>

<script setup lang="ts">
import axios from 'axios';
import { ref } from 'vue';

const number = ref(1);

const numberGoUp = async () => {
  const { data } = await axios.post('/api/up');
  number.value = data.number;
}
</script>
