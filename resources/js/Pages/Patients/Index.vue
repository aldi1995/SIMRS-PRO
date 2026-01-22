<script setup>
import AppLayout from '@/Layouts/AppLayout.vue'
import { Head } from '@inertiajs/vue3'
import { ref } from 'vue'
import {
  VCard,
  VBtn,
  VTextField,
  VDataTable,
  VChip,
  VIcon
} from 'vuetify/components'

const search = ref('')

const headers = [
  { title: 'No RM', key: 'rm' },
  { title: 'Nama Pasien', key: 'name' },
  { title: 'NIK', key: 'nik' },
  { title: 'Gender', key: 'gender' },
  { title: 'Tgl Lahir', key: 'dob' },
  { title: 'Status', key: 'status' },
  { title: 'Aksi', key: 'actions', sortable: false }
]

const patients = ref([
  { rm: 'RM001', name: 'Ahmad Fauzi', nik: '3275012345678901', gender: 'Laki-laki', dob: '1990-08-12', status: 'Aktif' },
  { rm: 'RM002', name: 'Siti Rahma', nik: '3275098765432100', gender: 'Perempuan', dob: '1995-03-22', status: 'Aktif' }
])
</script>

<template>
  <Head title="Master Pasien | SIMRS PRO" />

  <AppLayout>

    <!-- HEADER -->
    <div class="d-flex justify-space-between mb-4">
      <div>
        <h2 class="text-h5 font-weight-bold text-white">
          Master Pasien
        </h2>
        <p class="text-caption muted-text">
          Database utama pasien rumah sakit
        </p>
      </div>

      <v-btn
        color="primary"
        prepend-icon="mdi-plus"
        rounded="lg"
      >
        Tambah Pasien
      </v-btn>
    </div>

    <!-- SEARCH -->
    <v-card class="glass-panel pa-4 mb-4">
      <v-text-field
        v-model="search"
        label="Cari RM / Nama / NIK"
        prepend-inner-icon="mdi-magnify"
        variant="outlined"
        density="comfortable"
        class="dark-input"
      />
    </v-card>

    <!-- TABLE -->
    <v-card class="glass-panel pa-2">
      <v-data-table
        :headers="headers"
        :items="patients"
        :search="search"
        class="dark-table"
      >

        <!-- STATUS -->
        <template #item.status="{ value }">
          <v-chip
            size="small"
            class="status-chip"
          >
            {{ value }}
          </v-chip>
        </template>

        <!-- ACTION -->
        <template #item.actions>
          <v-btn icon size="small" variant="text" class="icon-btn">
            <v-icon>mdi-eye</v-icon>
          </v-btn>
          <v-btn icon size="small" variant="text" class="icon-btn">
            <v-icon>mdi-pencil</v-icon>
          </v-btn>
        </template>

      </v-data-table>
    </v-card>

  </AppLayout>
</template>

<style scoped>
/* Glass Panel */
.glass-panel {
  background: rgba(255, 255, 255, 0.06);
  backdrop-filter: blur(14px);
  border-radius: 18px;
  border: 1px solid rgba(255, 255, 255, 0.08);
  color: #e5e7eb;
}

/* Muted Text */
.muted-text {
  color: #94a3b8;
}

/* Input Dark */
.dark-input :deep(.v-field) {
  background: rgba(255,255,255,0.04);
  border-radius: 12px;
}

/* Table */
.dark-table {
  color: #e5e7eb;
}

:deep(.v-data-table-header) {
  background: rgba(255,255,255,0.04);
}

:deep(.v-data-table__td),
:deep(.v-data-table__th) {
  border-color: rgba(255,255,255,0.06);
}

/* Status Chip */
.status-chip {
  background: rgba(34, 197, 94, 0.18);
  color: #4ade80;
  border: 1px solid rgba(34,197,94,0.35);
}

/* Action Icon */
.icon-btn {
  color: #93c5fd;
}
.icon-btn:hover {
  color: #60a5fa;
}
</style>
