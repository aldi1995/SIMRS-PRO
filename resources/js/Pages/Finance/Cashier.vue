<script setup>
import AppLayout from '@/Layouts/AppLayout.vue'
import { ref } from 'vue'

const payments = ref([
  { invoice: 'INV-20260125-001', patient: 'Ahmad Fauzi', amount: 1250000, method: 'QRIS', status: 'Lunas' },
  { invoice: 'INV-20260125-002', patient: 'Siti Rahma', amount: 420000, method: 'Tunai', status: 'Pending' }
])
</script>

<template>
<AppLayout>
<v-card class="glass-card pa-6">
<h2 class="text-h6 font-weight-bold mb-1">Kasir & Pembayaran</h2>
<p class="text-muted mb-4">Riwayat transaksi pembayaran pasien</p>

<v-data-table :items="payments" class="glass-table">
<template #headers>
<tr>
<th>Invoice</th>
<th>Pasien</th>
<th>Total</th>
<th>Metode</th>
<th>Status</th>
<th class="text-right">Aksi</th>
</tr>
</template>

<template #item="{ item }">
<tr>
<td>{{ item.invoice }}</td>
<td>{{ item.patient }}</td>
<td>Rp {{ item.amount.toLocaleString() }}</td>
<td>{{ item.method }}</td>

<td>
<v-chip :color="item.status === 'Lunas' ? 'green' : 'orange'" size="small">
{{ item.status }}
</v-chip>
</td>

<td class="text-right">
<v-btn icon><v-icon>mdi-receipt</v-icon></v-btn>
</td>
</tr>
</template>
</v-data-table>

</v-card>
</AppLayout>
</template>
