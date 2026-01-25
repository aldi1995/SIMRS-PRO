<script setup>
import AppLayout from '@/Layouts/AppLayout.vue'
import { ref } from 'vue'

const suppliers = ref([
  { name: 'PT Medika Jaya', contact: '021-889977', status: 'Aktif' },
  { name: 'CV Farma Sentosa', contact: '021-773344', status: 'Nonaktif' }
])
</script>

<template>
<AppLayout>
<v-card class="glass-card pa-6">

<h2 class="text-h6 font-weight-bold mb-2">Supplier</h2>
<p class="text-muted mb-4">Daftar mitra vendor RS</p>

<v-data-table :items="suppliers" class="glass-table">
<template #headers>
<tr>
<th>Nama Supplier</th>
<th>Kontak</th>
<th>Status</th>
<th class="text-right">Aksi</th>
</tr>
</template>

<template #item="{ item }">
<tr>
<td>{{ item.name }}</td>
<td>{{ item.contact }}</td>

<td>
<v-chip :color="item.status === 'Aktif' ? 'green' : 'grey'" size="small">
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
