<script setup>
import AppLayout from '@/Layouts/AppLayout.vue'
import { Head } from '@inertiajs/vue3'
import { ref } from 'vue'
import { VCard, VDataTable, VBtn } from 'vuetify/components'

const headers = [
  { title: 'Role', key: 'role' },
  { title: 'Jumlah Permission', key: 'permissions' },
  { title: 'Aksi', key: 'actions', sortable: false }
]

const roles = ref([
  { role: 'Super Admin', permissions: 54 },
  { role: 'Dokter', permissions: 22 },
  { role: 'Kasir', permissions: 10 }
])
</script>

<template>
  <Head title="Role & Permission" />
  <AppLayout>

    <div class="d-flex justify-space-between mb-4">
      <h2 class="text-h5 font-weight-bold text-white">
        Role & Permission
      </h2>
      <v-btn color="primary" prepend-icon="mdi-plus">Tambah Role</v-btn>
    </div>

    <v-card class="glass-panel pa-2">
      <v-data-table :headers="headers" :items="roles">
        <template #item.actions>
          <v-btn size="small" variant="text" color="primary">Kelola</v-btn>
        </template>
      </v-data-table>
    </v-card>

  </AppLayout>
</template>
