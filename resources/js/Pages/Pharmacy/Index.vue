<script setup>
import AppLayout from '@/Layouts/AppLayout.vue'
import { Head } from '@inertiajs/vue3'

const rows = [
  { id: 1, medicine: 'Paracetamol', stock: 120, status: 'Aman' },
  { id: 2, medicine: 'Amoxicillin', stock: 5, status: 'Menipis' }
]
</script>

<template>
  <Head title="Farmasi" />
  <AppLayout>

    <h1 class="page-title mb-5">Stok Farmasi</h1>

    <v-card class="glass-card pa-4">
      <v-table>
        <thead>
          <tr>
            <th>Obat</th><th>Stok</th><th>Status</th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="r in rows" :key="r.id">
            <td>{{ r.medicine }}</td>
            <td>{{ r.stock }}</td>
            <td>
              <v-chip :color="r.status === 'Aman' ? 'green' : 'orange'">
                {{ r.status }}
              </v-chip>
            </td>
          </tr>
        </tbody>
      </v-table>
    </v-card>

  </AppLayout>
</template>
