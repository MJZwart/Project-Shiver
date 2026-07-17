<template>
    <div flex flex-col items-center>
        <button @click="oof">Shit out error</button>
    </div>
</template>

<script setup lang="ts">
import { http } from '../http';

const oof = async () => {
    const { data } = await http.post('/api/login');
}

</script>
