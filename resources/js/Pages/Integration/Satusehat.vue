<script setup>
import AppLayout from '@/Layouts/AppLayout.vue'
import { ref } from 'vue'

const sync = ref([
  { module: 'Pasien', status: 'Synced' },
  { module: 'Encounter', status: 'Pending' }
])
</script>

<template>
<AppLayout>
<v-card class="glass-card pa-6">

<h2 class="text-h6 font-weight-bold mb-2">Integrasi SatuSehat</h2>
<p class="text-muted mb-4">Status sinkronisasi Kemenkes</p>

<v-data-table :items="sync" class="glass-table">
<template #headers>
<tr>
<th>Modul</th>
<th>Status Sinkronisasi</th>
<th class="text-right">Aksi</th>
</tr>
</template>

<template #item="{ item }">
<tr>
<td>{{ item.module }}</td>
<td>
<v-chip :color="item.status === 'Synced' ? 'green' : 'orange'" size="small">
{{ item.status }}
</v-chip>
</td>

<td class="text-right">
<v-btn icon><v-icon>mdi-sync</v-icon></v-btn>
</td>
</tr>
</template>
</v-data-table>

</v-card>
</AppLayout>
</template>
