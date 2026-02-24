-- ============================================================
-- UHS - University Health Services
-- ============================================================

CREATE DATABASE IF NOT EXISTS plm_uhs_db
    CHARACTER SET utf8mb4
    COLLATE utf8mb4_unicode_ci;

USE plm_uhs_db;

-- ------------------------------------------------------------
-- ROLES TABLE
-- Defines user types in the system
-- ------------------------------------------------------------
CREATE TABLE roles (
    id          TINYINT UNSIGNED PRIMARY KEY AUTO_INCREMENT,
    name        VARCHAR(50) NOT NULL UNIQUE,
    description VARCHAR(255) NULL,
    created_at  TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);


-- ------------------------------------------------------------
-- USERS TABLE
-- Core authentication — stores login credentials only
-- ------------------------------------------------------------
CREATE TABLE users (
    id                  INT UNSIGNED PRIMARY KEY AUTO_INCREMENT,
    role_id             TINYINT UNSIGNED NOT NULL DEFAULT 5,   -- default: patient
    email               VARCHAR(191) NOT NULL UNIQUE,
    password_hash       VARCHAR(255) NOT NULL,                 -- PHP password_hash() bcrypt
    is_active           TINYINT(1) UNSIGNED DEFAULT 1,         -- 0 = banned/deactivated
    is_email_verified   TINYINT(1) UNSIGNED DEFAULT 0,
    email_verified_at   TIMESTAMP NULL,
    failed_attempts     TINYINT UNSIGNED DEFAULT 0,            -- brute-force counter
    lockout_until       DATETIME NULL,                         -- account lockout expiry
    last_login_at       TIMESTAMP NULL,
    last_login_ip       VARCHAR(45) NULL,                      -- supports IPv6
    created_at          TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at          TIMESTAMP DEFAULT CURRENT_TIMESTAMP
                        ON UPDATE CURRENT_TIMESTAMP,

    CONSTRAINT fk_users_role
        FOREIGN KEY (role_id) REFERENCES roles(id)
        ON DELETE RESTRICT ON UPDATE CASCADE,

    INDEX idx_email   (email),
    INDEX idx_role_id (role_id)
) ENGINE=InnoDB;


-- ------------------------------------------------------------
-- USER PROFILES TABLE
-- Personal information from the registration form
-- ------------------------------------------------------------
CREATE TABLE user_profiles (
    id              INT UNSIGNED PRIMARY KEY AUTO_INCREMENT,
    user_id         INT UNSIGNED NOT NULL UNIQUE,

    -- Name fields (matches form: First, Middle, Last)
    first_name      VARCHAR(100) NOT NULL,
    middle_name     VARCHAR(100) NULL,
    last_name       VARCHAR(100) NOT NULL,

    -- Contact
    phone_number    VARCHAR(20) NOT NULL,

    -- Personal
    date_of_birth   DATE NOT NULL,
    gender          ENUM(
                        'Male',
                        'Female',
                        'Other',
                        'Prefer not to say'
                    ) NOT NULL,

    -- Optional extras
    address         TEXT NULL,
    profile_photo   VARCHAR(255) NULL,                        -- stored file path

    created_at      TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at      TIMESTAMP DEFAULT CURRENT_TIMESTAMP
                    ON UPDATE CURRENT_TIMESTAMP,

    CONSTRAINT fk_profiles_user
        FOREIGN KEY (user_id) REFERENCES users(id)
        ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB;


-- ------------------------------------------------------------
-- COLLEGES TABLE
-- Lookup table for colleges/departments (normalized)
-- ------------------------------------------------------------
CREATE TABLE colleges (
    id      TINYINT UNSIGNED PRIMARY KEY AUTO_INCREMENT,
    name    VARCHAR(150) NOT NULL UNIQUE
);


-- ------------------------------------------------------------
-- PROGRAMS TABLE
-- Lookup table for academic programs
-- ------------------------------------------------------------
CREATE TABLE programs (
    id          SMALLINT UNSIGNED PRIMARY KEY AUTO_INCREMENT,
    college_id  TINYINT UNSIGNED NOT NULL,
    code        VARCHAR(20) NOT NULL UNIQUE,                  -- e.g. "BSIT"
    name        VARCHAR(150) NOT NULL,                        -- e.g. "BS Information Technology"

    CONSTRAINT fk_programs_college
        FOREIGN KEY (college_id) REFERENCES colleges(id)
        ON DELETE RESTRICT ON UPDATE CASCADE
) ENGINE=InnoDB;



-- ------------------------------------------------------------
-- PATIENT DETAILS TABLE
-- Student-specific information from the registration form
-- ------------------------------------------------------------
CREATE TABLE patient_details (
    id              INT UNSIGNED PRIMARY KEY AUTO_INCREMENT,
    user_id         INT UNSIGNED NOT NULL UNIQUE,

    -- Student info (matches form fields)
    student_id      VARCHAR(20) NOT NULL UNIQUE,              -- e.g. "2024-12XXX"
    program_id      SMALLINT UNSIGNED NOT NULL,               -- FK to programs
    year_level      ENUM(
                        '1st Year',
                        '2nd Year',
                        '3rd Year',
                        '4th Year',
                        '5th Year',
                        'Graduate'
                    ) NOT NULL,
    section         VARCHAR(20) NOT NULL,                     -- e.g. "A", "IT301"

    -- Medical extras (useful for clinic)
    blood_type      ENUM(
                        'A+','A-','B+','B-',
                        'AB+','AB-','O+','O-',
                        'Unknown'
                    ) DEFAULT 'Unknown',
    allergies       TEXT NULL,
    emergency_contact_name  VARCHAR(150) NULL,
    emergency_contact_phone VARCHAR(20) NULL,

    created_at      TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at      TIMESTAMP DEFAULT CURRENT_TIMESTAMP
                    ON UPDATE CURRENT_TIMESTAMP,

    CONSTRAINT fk_patient_user
        FOREIGN KEY (user_id) REFERENCES users(id)
        ON DELETE CASCADE ON UPDATE CASCADE,

    CONSTRAINT fk_patient_program
        FOREIGN KEY (program_id) REFERENCES programs(id)
        ON DELETE RESTRICT ON UPDATE CASCADE,

    INDEX idx_student_id (student_id),
    INDEX idx_program_id (program_id)
) ENGINE=InnoDB;


-- ------------------------------------------------------------
-- STAFF DETAILS TABLE
-- For admin, doctor, nurse, dentist accounts (not patients)
-- ------------------------------------------------------------
CREATE TABLE staff_details (
    id                  INT UNSIGNED PRIMARY KEY AUTO_INCREMENT,
    user_id             INT UNSIGNED NOT NULL UNIQUE,
    employee_id         VARCHAR(50) NOT NULL UNIQUE,          -- e.g. "EMP-2024-001"
    department          VARCHAR(100) NULL,                    -- "Medical" or "Dental"
    specialization      VARCHAR(100) NULL,                    -- e.g. "Orthodontics"
    license_number      VARCHAR(100) NULL,                    -- PRC license no.
    license_expiry      DATE NULL,

    created_at          TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at          TIMESTAMP DEFAULT CURRENT_TIMESTAMP
                        ON UPDATE CURRENT_TIMESTAMP,

    CONSTRAINT fk_staff_user
        FOREIGN KEY (user_id) REFERENCES users(id)
        ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB;


-- ------------------------------------------------------------
-- EMAIL VERIFICATIONS TABLE
-- Token sent after registration
-- ------------------------------------------------------------
CREATE TABLE email_verifications (
    id          INT UNSIGNED PRIMARY KEY AUTO_INCREMENT,
    user_id     INT UNSIGNED NOT NULL,
    token       VARCHAR(255) NOT NULL UNIQUE,                 -- random hex token
    expires_at  DATETIME NOT NULL,                           -- e.g. +24 hours
    created_at  TIMESTAMP DEFAULT CURRENT_TIMESTAMP,

    CONSTRAINT fk_verify_user
        FOREIGN KEY (user_id) REFERENCES users(id)
        ON DELETE CASCADE ON UPDATE CASCADE,

    INDEX idx_token (token)
) ENGINE=InnoDB;


-- ------------------------------------------------------------
-- PASSWORD RESETS TABLE
-- Token sent on "Forgot Password"
-- ------------------------------------------------------------
CREATE TABLE password_resets (
    id          INT UNSIGNED PRIMARY KEY AUTO_INCREMENT,
    user_id     INT UNSIGNED NOT NULL,
    token       VARCHAR(255) NOT NULL UNIQUE,                 -- hashed OTP/token
    expires_at  DATETIME NOT NULL,                           -- e.g. +15 minutes
    used_at     TIMESTAMP NULL DEFAULT NULL,                 -- NULL = unused
    created_at  TIMESTAMP DEFAULT CURRENT_TIMESTAMP,

    CONSTRAINT fk_reset_user
        FOREIGN KEY (user_id) REFERENCES users(id)
        ON DELETE CASCADE ON UPDATE CASCADE,

    INDEX idx_token (token)
) ENGINE=InnoDB;


-- ------------------------------------------------------------
-- USER SESSIONS TABLE
-- Server-side session control (force logout, track devices)
-- ------------------------------------------------------------
CREATE TABLE user_sessions (
    id              INT UNSIGNED PRIMARY KEY AUTO_INCREMENT,
    user_id         INT UNSIGNED NOT NULL,
    session_token   VARCHAR(255) NOT NULL UNIQUE,
    ip_address      VARCHAR(45) NOT NULL,
    user_agent      TEXT NULL,
    expires_at      DATETIME NOT NULL,
    created_at      TIMESTAMP DEFAULT CURRENT_TIMESTAMP,

    CONSTRAINT fk_session_user
        FOREIGN KEY (user_id) REFERENCES users(id)
        ON DELETE CASCADE ON UPDATE CASCADE,

    INDEX idx_token   (session_token),
    INDEX idx_user_id (user_id)
) ENGINE=InnoDB;


-- ------------------------------------------------------------
-- AUDIT LOGS TABLE
-- Tracks logins, failed attempts, password resets, etc.
-- ------------------------------------------------------------
CREATE TABLE audit_logs (
    id          INT UNSIGNED PRIMARY KEY AUTO_INCREMENT,
    user_id     INT UNSIGNED NULL,                            -- NULL if unknown user
    action      VARCHAR(100) NOT NULL,
    ip_address  VARCHAR(45) NOT NULL,
    user_agent  TEXT NULL,
    details     TEXT NULL,
    created_at  TIMESTAMP DEFAULT CURRENT_TIMESTAMP,

    CONSTRAINT fk_audit_user
        FOREIGN KEY (user_id) REFERENCES users(id)
        ON DELETE SET NULL ON UPDATE CASCADE,

    INDEX idx_user_id  (user_id),
    INDEX idx_action   (action),
    INDEX idx_created  (created_at)
) ENGINE=InnoDB;

