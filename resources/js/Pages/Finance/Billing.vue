<script setup>
import AppLayout from '@/Layouts/AppLayout.vue'
import { Head } from '@inertiajs/vue3'

const rows = [
  { id: 1, patient: 'Ahmad Fauzi', total: 1250000, status: 'Belum Lunas' },
  { id: 2, patient: 'Siti Rahma', total: 750000, status: 'Lunas' }
]
</script>

<template>
  <Head title="Billing" />
  <AppLayout>

    <h1 class="page-title mb-5">Billing Pasien</h1>

    <v-card class="glass-card pa-4">
      <v-table>
        <thead>
          <tr>
            <th>Pasien</th><th>Total</th><th>Status</th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="r in rows" :key="r.id">
            <td>{{ r.patient }}</td>
            <td>Rp {{ r.total.toLocaleString() }}</td>
            <td>
              <v-chip :color="r.status === 'Lunas' ? 'green' : 'red'">
                {{ r.status }}
              </v-chip>
            </td>
          </tr>
        </tbody>
      </v-table>
    </v-card>

  </AppLayout>
</template>
