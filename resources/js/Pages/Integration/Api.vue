<script setup>
import AppLayout from '@/Layouts/AppLayout.vue'
import { ref } from 'vue'

const apis = ref([
  { name: 'BPJS API', status: 'Online' },
  { name: 'SatuSehat API', status: 'Offline' }
])
</script>

<template>
<AppLayout>
<v-card class="glass-card pa-6">

<h2 class="text-h6 font-weight-bold mb-2">API Manager</h2>
<p class="text-muted mb-4">Status koneksi API eksternal</p>

<v-data-table :items="apis" class="glass-table">
<template #headers>
<tr>
<th>API</th>
<th>Status</th>
<th class="text-right">Aksi</th>
</tr>
</template>

<template #item="{ item }">
<tr>
<td>{{ item.name }}</td>
<td>
<v-chip :color="item.status === 'Online' ? 'green' : 'red'" size="small">
{{ item.status }}
</v-chip>
</td>

<td class="text-right">
<v-btn icon><v-icon>mdi-restart</v-icon></v-btn>
</td>
</tr>
</template>
</v-data-table>

</v-card>
</AppLayout>
</template>
