<template>
  <div flex flex-col items-center>
    <span font-700 text-size-3xl mb-2>{{ number }}</span>
    <button @click="numberGoUp">Number go up</button>
  </div>
</template>

<script setup lang="ts">
import { useEchoPublic } from '@laravel/echo-vue';
import axios from 'axios';
import { ref } from 'vue';

// Important to note the number only updates after clicking or after a websocket event. Not important for testing.
const number = ref(1);

const numberGoUp = async () => {
  const { data } = await axios.post('/api/up');
  number.value = data.number;
}

// Automatically connects to public channel 'number' and updates the number when anyone triggers the event.
useEchoPublic(
  'number',
  'NumberUpdated',
  (event: { number: number }) => {
    if (!event || !event.number) return;
    number.value = event.number;
  });
</script>
