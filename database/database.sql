
-- ============================================
-- DATABASE PENDAFTARAN PKL ONLINE
-- ============================================

CREATE DATABASE IF NOT EXISTS pendaftaran_pkl
CHARACTER SET utf8mb4
COLLATE utf8mb4_unicode_ci;

USE pendaftaran_pkl;

-- ============================================
-- 1. TABEL USERS
-- Menyimpan akun untuk login
-- ============================================

CREATE TABLE users (
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    nama VARCHAR(100) NOT NULL,
    username VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    role ENUM('admin', 'siswa', 'pembimbing') NOT NULL DEFAULT 'siswa',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
        ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB;

-- ============================================
-- 2. TABEL SISWA
-- Menyimpan identitas siswa
-- ============================================

CREATE TABLE siswa (
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    user_id INT UNSIGNED UNIQUE,
    nis VARCHAR(30) NOT NULL UNIQUE,
    nama_siswa VARCHAR(100) NOT NULL,
    jenis_kelamin ENUM('L', 'P') NOT NULL,
    kelas VARCHAR(30) NOT NULL,
    jurusan VARCHAR(100) NOT NULL,
    alamat TEXT,
    no_hp VARCHAR(20),
    email VARCHAR(100),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
        ON UPDATE CURRENT_TIMESTAMP,

    CONSTRAINT fk_siswa_user
        FOREIGN KEY (user_id) REFERENCES users(id)
        ON UPDATE CASCADE
        ON DELETE SET NULL
) ENGINE=InnoDB;

-- ============================================
-- 3. TABEL TEMPAT PKL
-- Menyimpan data perusahaan/tempat PKL
-- ============================================

CREATE TABLE tempat_pkl (
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    nama_tempat VARCHAR(150) NOT NULL,
    bidang_usaha VARCHAR(100),
    alamat TEXT NOT NULL,
    nama_kontak VARCHAR(100),
    no_hp VARCHAR(20),
    email VARCHAR(100),
    kuota INT UNSIGNED NOT NULL DEFAULT 0,
    deskripsi TEXT,
    status ENUM('aktif', 'nonaktif') NOT NULL DEFAULT 'aktif',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
        ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB;

-- ============================================
-- 4. TABEL PEMBIMBING
-- Menyimpan data guru pembimbing
-- ============================================

CREATE TABLE pembimbing (
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    user_id INT UNSIGNED UNIQUE,
    nip VARCHAR(30) UNIQUE,
    nama_pembimbing VARCHAR(100) NOT NULL,
    no_hp VARCHAR(20),
    email VARCHAR(100),
    alamat TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
        ON UPDATE CURRENT_TIMESTAMP,

    CONSTRAINT fk_pembimbing_user
        FOREIGN KEY (user_id) REFERENCES users(id)
        ON UPDATE CASCADE
        ON DELETE SET NULL
) ENGINE=InnoDB;

-- ============================================
-- 5. TABEL PENDAFTARAN
-- Menyimpan pengajuan PKL siswa
-- ============================================

CREATE TABLE pendaftaran (
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    siswa_id INT UNSIGNED NOT NULL,
    tempat_pkl_id INT UNSIGNED NOT NULL,
    pembimbing_id INT UNSIGNED NULL,
    tanggal_daftar DATE NOT NULL,
    tanggal_mulai DATE,
    tanggal_selesai DATE,
    status ENUM(
        'menunggu',
        'diterima',
        'ditolak',
        'selesai'
    ) NOT NULL DEFAULT 'menunggu',
    catatan TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
        ON UPDATE CURRENT_TIMESTAMP,

    CONSTRAINT fk_pendaftaran_siswa
        FOREIGN KEY (siswa_id) REFERENCES siswa(id)
        ON UPDATE CASCADE
        ON DELETE RESTRICT,

    CONSTRAINT fk_pendaftaran_tempat
        FOREIGN KEY (tempat_pkl_id) REFERENCES tempat_pkl(id)
        ON UPDATE CASCADE
        ON DELETE RESTRICT,

    CONSTRAINT fk_pendaftaran_pembimbing
        FOREIGN KEY (pembimbing_id) REFERENCES pembimbing(id)
        ON UPDATE CASCADE
        ON DELETE SET NULL
) ENGINE=InnoDB;

-- ============================================
-- 6. TABEL JADWAL
-- Menyimpan jadwal kegiatan PKL
-- ============================================

CREATE TABLE jadwal (
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    pendaftaran_id INT UNSIGNED NOT NULL,
    judul_kegiatan VARCHAR(150) NOT NULL,
    tanggal DATE NOT NULL,
    jam_mulai TIME,
    jam_selesai TIME,
    lokasi VARCHAR(150),
    keterangan TEXT,
    status ENUM('terjadwal', 'selesai', 'batal')
        NOT NULL DEFAULT 'terjadwal',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
        ON UPDATE CURRENT_TIMESTAMP,

    CONSTRAINT fk_jadwal_pendaftaran
        FOREIGN KEY (pendaftaran_id) REFERENCES pendaftaran(id)
        ON UPDATE CASCADE
        ON DELETE CASCADE
) ENGINE=InnoDB;

-- ============================================
-- 7. TABEL LAPORAN
-- Menyimpan laporan kegiatan PKL
-- ============================================

CREATE TABLE laporan (
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    pendaftaran_id INT UNSIGNED NOT NULL,
    judul_laporan VARCHAR(150) NOT NULL,
    tanggal_laporan DATE NOT NULL,
    isi_laporan TEXT NOT NULL,
    file_laporan VARCHAR(255),
    status ENUM('menunggu', 'disetujui', 'revisi')
        NOT NULL DEFAULT 'menunggu',
    catatan_pembimbing TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
        ON UPDATE CURRENT_TIMESTAMP,

    CONSTRAINT fk_laporan_pendaftaran
        FOREIGN KEY (pendaftaran_id) REFERENCES pendaftaran(id)
        ON UPDATE CASCADE
        ON DELETE CASCADE
) ENGINE=InnoDB;

-- ============================================
-- SELESAI
-- Database pendaftaran_pkl berhasil disiapkan
-- ============================================
