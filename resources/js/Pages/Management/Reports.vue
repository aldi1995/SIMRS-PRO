<script setup>
import AppLayout from '@/Layouts/AppLayout.vue'
import { ref } from 'vue'

const reports = ref([
  { title: 'Laporan Keuangan Bulanan', category: 'Finance', date: '2026-01-25' },
  { title: 'Laporan BOR Rawat Inap', category: 'Operasional', date: '2026-01-25' }
])
</script>

<template>
<AppLayout>
<v-card class="glass-card pa-6">

<h2 class="text-h6 font-weight-bold mb-2">Laporan Rumah Sakit</h2>
<p class="text-muted mb-4">Dokumen laporan strategis RS</p>

<v-data-table :items="reports" class="glass-table">
<template #headers>
<tr>
<th>Nama Laporan</th>
<th>Kategori</th>
<th>Tanggal</th>
<th class="text-right">Aksi</th>
</tr>
</template>

<template #item="{ item }">
<tr>
<td>{{ item.title }}</td>
<td>{{ item.category }}</td>
<td>{{ item.date }}</td>

<td class="text-right">
<v-btn icon><v-icon>mdi-download</v-icon></v-btn>
</td>
</tr>
</template>
</v-data-table>

</v-card>
</AppLayout>
</template>
