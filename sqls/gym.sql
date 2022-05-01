 -- Database: `gym`

CREATE TABLE `admission` (
  `id` bigint NOT NULL,
  `fullname` varchar(200) NOT NULL,
  `age` int NOT NULL,
  `gender` varchar(100) NOT NULL,
  `dob` date NOT NULL,
  `address` varchar(200) NOT NULL,
  `phone1` bigint NOT NULL,
  `phone2` bigint NOT NULL,
  `email` varchar(100) NOT NULL,
  `doa` date NOT NULL
);

CREATE TABLE `auth` (
  `id` bigint NOT NULL,
  `userid` varchar(100) NOT NULL,
  `pass` varchar(200) NOT NULL
);

INSERT INTO `auth` (`id`, `userid`, `pass`) VALUES
(1, 'admin', 'admin123');

CREATE TABLE `contactus` (
  `id` bigint NOT NULL,
  `fullname` varchar(200) NOT NULL,
  `phone1` bigint NOT NULL,
  `email` varchar(200) NOT NULL,
  `address` varchar(200) NOT NULL,
  `dateofreq` date NOT NULL
);

CREATE TABLE `reviews` (
  `id` bigint NOT NULL,
  `name` varchar(200) NOT NULL,
  `quality` int NOT NULL,
  `statement` varchar(200) NOT NULL
);

ALTER TABLE `admission`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `auth`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `contactus`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `admission`
  MODIFY `id` bigint NOT NULL AUTO_INCREMENT;

ALTER TABLE `auth`
  MODIFY `id` bigint NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

ALTER TABLE `contactus`
  MODIFY `id` bigint NOT NULL AUTO_INCREMENT;

ALTER TABLE `reviews`
  MODIFY `id` bigint NOT NULL AUTO_INCREMENT;
