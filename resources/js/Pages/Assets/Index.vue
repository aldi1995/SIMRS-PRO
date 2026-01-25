<script setup>
import AppLayout from '@/Layouts/AppLayout.vue'
import { ref } from 'vue'

const assets = ref([
  { name: 'Ventilator ICU', category: 'Medis', location: 'ICU', status: 'Aktif' },
  { name: 'Ambulance 01', category: 'Transport', location: 'Garasi', status: 'Maintenance' }
])
</script>

<template>
<AppLayout>
<v-card class="glass-card pa-6">

<h2 class="text-h6 font-weight-bold mb-2">Aset Rumah Sakit</h2>
<p class="text-muted mb-4">Manajemen aset & alat utama</p>

<v-data-table :items="assets" class="glass-table">
<template #headers>
<tr>
<th>Nama Aset</th>
<th>Kategori</th>
<th>Lokasi</th>
<th>Status</th>
<th class="text-right">Aksi</th>
</tr>
</template>

<template #item="{ item }">
<tr>
<td>{{ item.name }}</td>
<td>{{ item.category }}</td>
<td>{{ item.location }}</td>

<td>
<v-chip :color="item.status === 'Aktif' ? 'green' : 'orange'" size="small">
{{ item.status }}
</v-chip>
</td>

<td class="text-right">
<v-btn icon><v-icon>mdi-pencil</v-icon></v-btn>
</td>
</tr>
</template>
</v-data-table>

</v-card>
</AppLayout>
</template>
