<script setup>
import AppLayout from '@/Layouts/AppLayout.vue'
import { ref } from 'vue'

const claims = ref([
  { sep: 'SEP20260125001', patient: 'Ahmad Fauzi', status: 'Terkirim' },
  { sep: 'SEP20260125002', patient: 'Siti Rahma', status: 'Pending' }
])
</script>

<template>
<AppLayout>
<v-card class="glass-card pa-6">

<h2 class="text-h6 font-weight-bold mb-2">BPJS V-Claim</h2>
<p class="text-muted mb-4">Monitoring klaim BPJS</p>

<v-data-table :items="claims" class="glass-table">
<template #headers>
<tr>
<th>No SEP</th>
<th>Pasien</th>
<th>Status Klaim</th>
<th class="text-right">Aksi</th>
</tr>
</template>

<template #item="{ item }">
<tr>
<td>{{ item.sep }}</td>
<td>{{ item.patient }}</td>

<td>
<v-chip :color="item.status === 'Terkirim' ? 'green' : 'orange'" size="small">
{{ item.status }}
</v-chip>
</td>

<td class="text-right">
<v-btn icon><v-icon>mdi-refresh</v-icon></v-btn>
</td>
</tr>
</template>
</v-data-table>

</v-card>
</AppLayout>
</template>
