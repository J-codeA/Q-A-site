-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";

--
-- Database: `teamfoobardatabase`
--

DROP DATABASE IF EXISTS teamfoobardatabase;
CREATE DATABASE teamfoobardatabase;
USE teamfoobardatabase;


CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(9999) NOT NULL,
  `email` mediumtext NOT NULL,
  `date` date NOT NULL,
  `replies` int(11) DEFAULT 0,
  `score` int(11) NOT NULL DEFAULT 0,
  `topics` int(11) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`),
); ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `topics`
--

CREATE TABLE `topics` (
  `topic_id` int(11) NOT NULL,
  `topic_name` mediumtext NOT NULL,
  `topic_content` mediumtext NOT NULL,
  `topic_creator` mediumtext NOT NULL,
  `comments` longtext NOT NULL,
  `views` int(11) NOT NULL DEFAULT 0,
  `date` date NOT NULL,
    PRIMARY KEY (`topic_id`),
    FOREIGN KEY (`topic_creator`) REFERENCES users(username)
); ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unique_index` (`username`);

--
-- AUTO_INCREMENT for dumped tables

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

-- create user to query product database --
GRANT SELECT, INSERT, DELETE, UPDATE
ON teamfoobardatabase.*
TO root@localhost
IDENTIFIED BY'root';
