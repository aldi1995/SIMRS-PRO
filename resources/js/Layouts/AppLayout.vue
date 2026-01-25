<script setup>
import { ref } from 'vue'
import { usePage, Link, router } from '@inertiajs/vue3'
import {
  VApp,
  VNavigationDrawer,
  VAppBar,
  VMain,
  VList,
  VListItem,
  VListItemTitle,
  VIcon,
  VSpacer,
  VBtn,
  VAvatar,
  VDivider,
  VListGroup,
  VDialog,
  VCard,
  VCardTitle,
  VCardText,
  VCardActions,
  VMenu
} from 'vuetify/components'

const drawer = ref(true)
const confirmLogout = ref(false)

const page = usePage()
const user = page.props.auth?.user

const logout = () => {
  router.post(route('logout'))
}

const menu = [
  { title: 'Dashboard', icon: 'mdi-view-dashboard', route: '/dashboard' },

  {
    title: 'Pelayanan Medis',
    icon: 'mdi-stethoscope',
    children: [
      { title: 'Pasien', route: '/patients' },
      { title: 'Kunjungan', route: '/visits' },
      { title: 'Rekam Medis', route: '/medical-records/index' },
      { title: 'IGD', route: '/igd' },
      { title: 'Rawat Jalan', route: '/outpatient' },
      { title: 'Rawat Inap', route: '/inpatient' },
      { title: 'Tindakan Medis', route: '/procedures' }
    ]
  },

  {
    title: 'Penunjang',
    icon: 'mdi-flask',
    children: [
      { title: 'Laboratorium', route: '/laboratory' },
      { title: 'Radiologi', route: '/radiology' },
      { title: 'Farmasi', route: '/pharmacy' }
    ]
  },

  {
    title: 'Keuangan',
    icon: 'mdi-cash-register',
    children: [
      { title: 'Billing', route: '/finance/billing' },
      { title: 'Kasir', route: '/finance/cashier' },
      { title: 'Klaim BPJS', route: '/finance/bpjs' },
      { title: 'Akuntansi', route: '/finance/accounting' }
    ]
  },

  {
    title: 'SDM / HRIS',
    icon: 'mdi-account-group',
    children: [
      { title: 'Data Pegawai', route: '/hr/employees' },
      { title: 'Shift & Jadwal', route: '/hr/schedules' },
      { title: 'Payroll', route: '/hr/payroll' }
    ]
  },

  {
    title: 'Logistik & Inventory',
    icon: 'mdi-warehouse',
    children: [
      { title: 'Stok Barang', route: '/inventory' },
      { title: 'Aset Rumah Sakit', route: '/assets' },
      { title: 'Supplier', route: '/suppliers' }
    ]
  },

  {
    title: 'Manajemen',
    icon: 'mdi-chart-line',
    children: [
      { title: 'Dashboard Eksekutif', route: '/management/dashboard' },
      { title: 'Laporan Rumah Sakit', route: '/management/reports' },
      { title: 'Statistik RS', route: '/management/statistics' }
    ]
  },

  {
    title: 'Integrasi',
    icon: 'mdi-api',
    children: [
      { title: 'BPJS V-Claim', route: '/integration/bpjs' },
      { title: 'SatuSehat', route: '/integration/satusehat' },
      { title: 'Antrean Nasional', route: '/integration/antrian' },
      { title: 'API Manager', route: '/integration/api' }
    ]
  },

  {
    title: 'Sistem',
    icon: 'mdi-cog',
    children: [
      { title: 'User Management', route: '/system/users' },
      { title: 'Role & Permission', route: '/system/roles' },
      { title: 'Audit Log', route: '/system/audit-log' },
      { title: 'Master Data', route: '/system/master-data' },
      { title: 'Pengaturan Sistem', route: '/system/settings' }
    ]
  }
]
</script>

<template>
  <v-app>

    <!-- SIDEBAR -->
    <v-navigation-drawer v-model="drawer" width="290" class="sidebar-glass">

      <div class="brand px-5 py-4">
        <strong class="text-h6">
          SIMRS<span class="text-primary">-PRO</span>
        </strong>
        <p class="brand-subtitle">Secure Healthcare System</p>
      </div>

      <v-divider class="mb-2" />

      <v-list nav density="comfortable">

        <template v-for="item in menu" :key="item.title">

          <v-list-item v-if="!item.children">
            <Link :href="item.route" class="sidebar-link">
              <v-icon :icon="item.icon" class="me-3" />
              <v-list-item-title>{{ item.title }}</v-list-item-title>
            </Link>
          </v-list-item>

          <v-list-group v-else>
            <template #activator="{ props }">
              <v-list-item v-bind="props">
                <template #prepend>
                  <v-icon :icon="item.icon" />
                </template>
                <v-list-item-title>{{ item.title }}</v-list-item-title>
              </v-list-item>
            </template>

            <v-list-item
              v-for="child in item.children"
              :key="child.title"
              class="ms-6"
            >
              <Link :href="child.route" class="sidebar-link">
                {{ child.title }}
              </Link>
            </v-list-item>

          </v-list-group>

        </template>

      </v-list>

    </v-navigation-drawer>

    <!-- TOP BAR -->
    <v-app-bar flat height="72" class="topbar-glass">

      <v-btn icon @click="drawer = !drawer">
        <v-icon>mdi-menu</v-icon>
      </v-btn>

      <v-spacer />

      <!-- PROFILE MENU -->
      <v-menu location="bottom end">

        <template #activator="{ props }">
          <v-btn v-bind="props" class="profile-btn" variant="text">
            <v-avatar size="36" color="primary">
              {{ user?.name?.charAt(0) }}
            </v-avatar>

            <span class="user-name">{{ user?.name }}</span>
            <v-icon size="18">mdi-chevron-down</v-icon>
          </v-btn>
        </template>

        <v-card class="profile-menu">

          <v-list density="compact">

            <v-list-item>
              <v-list-item-title class="font-weight-bold">
                {{ user?.name }}
              </v-list-item-title>
              <v-list-item-subtitle>
                {{ user?.email }}
              </v-list-item-subtitle>
            </v-list-item>

            <v-divider class="my-2" />

            <v-list-item link href="/profile">
              <template #prepend>
                <v-icon>mdi-account-edit</v-icon>
              </template>
              Edit Profile
            </v-list-item>

            <v-list-item link href="/system/settings">
              <template #prepend>
                <v-icon>mdi-cog</v-icon>
              </template>
              Pengaturan
            </v-list-item>

            <v-divider class="my-2" />

            <v-list-item @click="confirmLogout = true">
              <template #prepend>
                <v-icon color="red">mdi-logout</v-icon>
              </template>
              Logout
            </v-list-item>

          </v-list>

        </v-card>

      </v-menu>

    </v-app-bar>

    <!-- MAIN -->
    <v-main class="main-bg">
      <v-container fluid class="pa-6">
        <slot />
      </v-container>
    </v-main>

    <!-- LOGOUT MODAL -->
    <v-dialog v-model="confirmLogout" max-width="420">
      <v-card class="logout-solid">

        <v-card-title class="text-h6 font-weight-bold">
          Konfirmasi Logout
        </v-card-title>

        <v-card-text class="text-muted">
          Apakah Anda yakin ingin keluar dari SIMRS PRO?
        </v-card-text>

        <v-card-actions class="justify-end gap-2">
          <v-btn variant="outlined" @click="confirmLogout = false">
            Batal
          </v-btn>

          <v-btn color="red" @click="logout">
            Logout
          </v-btn>
        </v-card-actions>

      </v-card>
    </v-dialog>

  </v-app>
</template>

<style scoped>
.sidebar-glass {
  background: rgba(15, 23, 42, 0.96);
  border-right: 1px solid rgba(255, 255, 255, 0.08);
  color: #e5e7eb;
}

.brand-subtitle {
  font-size: 0.75rem;
  color: #94a3b8;
}

.topbar-glass {
  background: rgba(15, 23, 42, 0.95);
  border-bottom: 1px solid rgba(255, 255, 255, 0.08);
  color: white;
}

.user-name {
  font-size: 0.9rem;
  color: #cbd5f5;
}

.main-bg {
  background: linear-gradient(135deg, #020617, #0f172a);
  min-height: 100vh;
  color: white;
}

.sidebar-link {
  width: 100%;
  display: flex;
  align-items: center;
  gap: 10px;
  text-decoration: none;
  color: inherit;
}

.sidebar-link:hover {
  color: #60a5fa;
}

/* Profile Menu */
.profile-btn {
  display: flex;
  align-items: center;
  gap: 8px;
}

.profile-menu {
  background: #0f172a;
  border: 1px solid rgba(255,255,255,0.08);
  color: white;
  border-radius: 14px;
  min-width: 240px;
}

/* Logout Modal */
.logout-solid {
  background: #0f172a;
  border: 1px solid rgba(255,255,255,0.08);
  border-radius: 14px;
  color: white;
}

.text-muted {
  color: #94a3b8;
}
</style>
