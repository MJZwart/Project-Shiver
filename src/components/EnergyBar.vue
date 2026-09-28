<template>
    <div flex flex-col items-center>
        <button @click="payToWin">Cheat Energy</button>
        <button @click="gainEnergy">Plus</button>
        <button @click="spendEnergy">Minus</button>
        <div>Energy: {{ getPlayer?.energy }}</div>
        <div bg-green :style="barSize" />
    </div>
</template>

<script setup lang="ts">
import { useEchoPublic } from '@laravel/echo-vue';
import { http } from '../http';
import { computed, onMounted, ref } from 'vue';
import { currentPlayer, gainEnergy, getPlayer, payToWin, spendEnergy } from '../player';

onMounted(() => {
    currentPlayer();
})

const barSize = computed(() => 
    ({
        width: `${getPlayer.value ? 4*getPlayer.value.energy + 8 : 408}px`,
        height: `${getPlayer.value ? 408 - 4*getPlayer.value.energy : 8}px`,
    })
)

// TODO:: Delete this PoC (proof of concept, not piece of crap (ok actually its shit))

</script>
