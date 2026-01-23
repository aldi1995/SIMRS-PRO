<script setup>
import AppLayout from '@/Layouts/AppLayout.vue'
import { Head, Link } from '@inertiajs/vue3'

const rows = [
  { id: 1, patient: 'Ahmad Fauzi', procedure: 'Jahit Luka', doctor: 'dr. Andi', cost: 250000 },
  { id: 2, patient: 'Siti Rahma', procedure: 'USG', doctor: 'dr. Rina', cost: 400000 }
]
</script>

<template>
  <Head title="Tindakan Medis" />
  <AppLayout>

    <div class="page-header mb-5">
      <h1 class="page-title">Tindakan Medis</h1>
      <Link href="/procedures/create">
        <v-btn color="primary" prepend-icon="mdi-plus">Tambah</v-btn>
      </Link>
    </div>

    <v-card class="glass-card pa-4">
      <v-table>
        <thead>
          <tr>
            <th>Pasien</th><th>Tindakan</th><th>Dokter</th><th>Tarif</th><th>Aksi</th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="r in rows" :key="r.id">
            <td>{{ r.patient }}</td>
            <td>{{ r.procedure }}</td>
            <td>{{ r.doctor }}</td>
            <td>Rp {{ r.cost.toLocaleString() }}</td>
            <td class="d-flex gap-2">
              <v-btn icon="mdi-pencil" size="small" variant="tonal"/>
              <v-btn icon="mdi-delete" size="small" color="red" variant="tonal"/>
            </td>
          </tr>
        </tbody>
      </v-table>
    </v-card>

  </AppLayout>
</template>
