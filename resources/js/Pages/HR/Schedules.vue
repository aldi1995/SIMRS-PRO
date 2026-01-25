<script setup>
import AppLayout from '@/Layouts/AppLayout.vue'
import { ref } from 'vue'

const staff = ref([
  {
    name: 'dr. Andi Wijaya',
    role: 'Dokter Spesialis',
    unit: 'Poli Dalam',
    shift: 'Pagi'
  },
  {
    name: 'Siti Rahma',
    role: 'Perawat',
    unit: 'Rawat Inap',
    shift: 'Malam'
  }
])
</script>

<template>
  <AppLayout>
    <v-card class="glass-card pa-6">
      <h2 class="text-h6 font-weight-bold mb-2">Shift & Jadwal Pegawai</h2>
      <p class="text-muted mb-4">Manajemen jadwal SDM RS</p>

      <v-data-table :items="staff" class="glass-table">
        <template #headers>
          <tr>
            <th>Nama</th>
            <th>Role</th>
            <th>Unit</th>
            <th>Shift</th>
            <th class="text-right">Aksi</th>
          </tr>
        </template>

        <template #item="{ item }">
          <tr>
            <td>{{ item.name }}</td>
            <td>{{ item.role }}</td>
            <td>{{ item.unit }}</td>
            <td>
              <v-chip color="blue" size="small">{{ item.shift }}</v-chip>
            </td>

            <td class="text-right">
              <v-btn icon><v-icon>mdi-pencil</v-icon></v-btn>
              <v-btn icon color="red"><v-icon>mdi-delete</v-icon></v-btn>
            </td>
          </tr>
        </template>
      </v-data-table>
    </v-card>
  </AppLayout>
</template>
