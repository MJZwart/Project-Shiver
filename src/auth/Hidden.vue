<template>
    <PokeAnimation v-for="paw in pawsShown" :username="paw" />
    <div flex flex-col items-center>
        Hidden until logged in. Can delete this file when any other page is created.
        <div>
            <div v-for="user in activeUsers">
                {{ user.username }} <button @click="pokeUser(user.id)">Poke</button>
            </div>
        </div>
    </div>
</template>

<script setup lang="ts">
import { useEcho } from '@laravel/echo-vue';
import { getUser } from './auth';
import { onMounted, ref } from 'vue';
import type { User } from './types';
import PokeAnimation from '../components/PokeAnimation.vue';
import { http } from '../http.ts';

const activeUsers = ref<User[]>([]);

const pawsShown = ref<string[]>([]);

useEcho(
    `poke.${getUser.value?.id}`,
    'UserPoked',
    (e: { username: string }) => {
        pawsShown.value.push(e.username);
        setTimeout(() => {
            pawsShown.value.pop();
        }, 2500)
    });

onMounted(async () => {
    const { data } = await http.get('/api/users');
    activeUsers.value = data.data;
});

const pokeUser = (userId: number) => {
    http.post(`/api/poke/${userId}`);
}
</script>