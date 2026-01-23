<script setup>
import AppLayout from '@/Layouts/AppLayout.vue'
import { Head, Link } from '@inertiajs/vue3'

const rows = [
  { id: 1, patient: 'Ahmad Fauzi', test: 'Darah Lengkap', status: 'Selesai' },
  { id: 2, patient: 'Siti Rahma', test: 'Gula Darah', status: 'Menunggu' }
]
</script>

<template>
  <Head title="Laboratorium" />
  <AppLayout>

    <div class="page-header mb-5">
      <h1 class="page-title">Laboratorium</h1>
      <Link href="/laboratory/create">
        <v-btn color="primary" prepend-icon="mdi-plus">Tambah</v-btn>
      </Link>
    </div>

    <v-card class="glass-card pa-4">
      <v-table>
        <thead>
          <tr>
            <th>Pasien</th><th>Pemeriksaan</th><th>Status</th><th>Aksi</th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="r in rows" :key="r.id">
            <td>{{ r.patient }}</td>
            <td>{{ r.test }}</td>
            <td><v-chip color="teal">{{ r.status }}</v-chip></td>
            <td><v-btn icon="mdi-eye" size="small" variant="tonal"/></td>
          </tr>
        </tbody>
      </v-table>
    </v-card>

  </AppLayout>
</template>
