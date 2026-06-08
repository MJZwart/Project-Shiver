<template>
  <div flex flex-col>
    <button @click="numberGoUp">Number go up</button>
    {{ number }}
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
