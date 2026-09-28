import { computed, ref } from "vue";
import { http } from "./http";

// TODO:: Split off the types (what does that even mean lmao)
const player = ref<undefined>();

export const getPlayer = computed(() => {
    return player.value;
})

// TODO:: route names stink lmao
export const currentPlayer = async () => {
    const { data } = await http.get('/api/player/me');
    player.value = data;
}
export const payToWin = async () => {
    const { data } = await http.post('/api/player/hax');
    player.value = data;
}
export const gainEnergy = async () => {
    const { data } = await http.post('/api/player/gain');
    player.value = data;
}
export const spendEnergy = async () => {
    const { data } = await http.post('/api/player/spend');
    player.value = data;
}
