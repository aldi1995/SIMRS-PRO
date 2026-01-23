<script setup>
import AppLayout from '@/Layouts/AppLayout.vue'
import { Head, Link } from '@inertiajs/vue3'

const rows = [
  { id: 1, patient: 'Budi Santoso', room: 'VIP-01', doctor: 'dr. Arif', diagnosis: 'Pneumonia', status: 'Dirawat' },
  { id: 2, patient: 'Dewi Kartika', room: 'Kelas 2', doctor: 'dr. Lina', diagnosis: 'Demam Berdarah', status: 'Stabil' }
]
</script>

<template>
  <Head title="Rawat Inap" />
  <AppLayout>

    <div class="page-header mb-5">
      <h1 class="page-title">Rawat Inap</h1>
      <Link href="/inpatient/create">
        <v-btn color="primary" prepend-icon="mdi-plus">Tambah</v-btn>
      </Link>
    </div>

    <v-card class="glass-card pa-4">
      <v-table>
        <thead>
          <tr>
            <th>Pasien</th><th>Ruangan</th><th>Dokter</th><th>Diagnosa</th><th>Status</th><th>Aksi</th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="r in rows" :key="r.id">
            <td>{{ r.patient }}</td>
            <td>{{ r.room }}</td>
            <td>{{ r.doctor }}</td>
            <td>{{ r.diagnosis }}</td>
            <td><v-chip color="green">{{ r.status }}</v-chip></td>
            <td class="d-flex gap-2">
              <v-btn icon="mdi-eye" size="small" variant="tonal"/>
              <v-btn icon="mdi-pencil" size="small" variant="tonal"/>
            </td>
          </tr>
        </tbody>
      </v-table>
    </v-card>

  </AppLayout>
</template>
