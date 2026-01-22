<script setup>
import AppLayout from '@/Layouts/AppLayout.vue'
import { Head } from '@inertiajs/vue3'
import { ref } from 'vue'
import { VCard, VDataTable, VBtn, VChip } from 'vuetify/components'

const headers = [
  { title: 'Nama', key: 'name' },
  { title: 'Email', key: 'email' },
  { title: 'Role', key: 'role' },
  { title: 'Status', key: 'status' },
  { title: 'Aksi', key: 'actions', sortable: false }
]

const users = ref([
  { name: 'Admin 1', email: 'admin@rs.com', role: 'Super Admin', status: 'Aktif' },
  { name: 'dr. Andi', email: 'andi@rs.com', role: 'Dokter', status: 'Aktif' },
  { name: 'Kasir 1', email: 'kasir@rs.com', role: 'Kasir', status: 'Nonaktif' }
])
</script>

<template>
  <Head title="User Management" />
  <AppLayout>

    <div class="d-flex justify-space-between mb-4">
      <h2 class="text-h5 font-weight-bold text-white">
        User Management
      </h2>
      <v-btn color="primary" prepend-icon="mdi-plus">Tambah User</v-btn>
    </div>

    <v-card class="glass-panel pa-2">
      <v-data-table :headers="headers" :items="users">

        <template #item.status="{ value }">
          <v-chip size="small" :color="value === 'Aktif' ? 'green' : 'grey'">
            {{ value }}
          </v-chip>
        </template>

        <template #item.actions>
          <v-btn size="small" variant="text" color="primary">Edit</v-btn>
        </template>

      </v-data-table>
    </v-card>

  </AppLayout>
</template>
