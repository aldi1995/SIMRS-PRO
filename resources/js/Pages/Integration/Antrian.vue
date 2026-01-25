<script setup>
import AppLayout from '@/Layouts/AppLayout.vue'
import { ref } from 'vue'

const queue = ref([
  { poli: 'Penyakit Dalam', waiting: 18 },
  { poli: 'Anak', waiting: 12 }
])
</script>

<template>
<AppLayout>
<v-card class="glass-card pa-6">

<h2 class="text-h6 font-weight-bold mb-2">Antrean Nasional</h2>
<p class="text-muted mb-4">Status antrean per poli</p>

<v-data-table :items="queue" class="glass-table">
<template #headers>
<tr>
<th>Poli</th>
<th>Jumlah Menunggu</th>
</tr>
</template>

<template #item="{ item }">
<tr>
<td>{{ item.poli }}</td>
<td>{{ item.waiting }}</td>
</tr>
</template>
</v-data-table>

</v-card>
</AppLayout>
</template>
