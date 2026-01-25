<script setup>
import AppLayout from '@/Layouts/AppLayout.vue'
import { ref } from 'vue'

const payroll = ref([
  { name: 'dr. Andi Wijaya', role: 'Dokter', salary: 18000000, status: 'Dibayar' },
  { name: 'Siti Rahma', role: 'Perawat', salary: 8500000, status: 'Pending' }
])
</script>

<template>
<AppLayout>
<v-card class="glass-card pa-6">
<h2 class="text-h6 font-weight-bold mb-2">Payroll Pegawai</h2>
<p class="text-muted mb-4">Status pembayaran gaji SDM</p>

<v-data-table :items="payroll" class="glass-table">
<template #headers>
<tr>
<th>Nama</th>
<th>Role</th>
<th>Gaji</th>
<th>Status</th>
<th class="text-right">Aksi</th>
</tr>
</template>

<template #item="{ item }">
<tr>
<td>{{ item.name }}</td>
<td>{{ item.role }}</td>
<td>Rp {{ item.salary.toLocaleString() }}</td>

<td>
<v-chip :color="item.status === 'Dibayar' ? 'green' : 'orange'" size="small">
{{ item.status }}
</v-chip>
</td>

<td class="text-right">
<v-btn icon><v-icon>mdi-check</v-icon></v-btn>
</td>
</tr>
</template>
</v-data-table>
</v-card>
</AppLayout>
</template>
