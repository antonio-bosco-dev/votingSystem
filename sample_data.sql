-- Dumping data for table `artisti`
INSERT INTO `artists` (`id`, `name`, `title`, `link`) VALUES
(1, 'Leonardo Da Vinci', 'La Gioconda', 'https://en.wikipedia.org/wiki/Mona_Lisa'),
(2, 'Vincent van Gogh', 'Notte stellata', 'https://en.wikipedia.org/wiki/The_Starry_Night'),
(3, 'Pablo Picasso', 'Les Demoiselles d\'Avignon', 'https://en.wikipedia.org/wiki/Les_Demoiselles_d%27Avignon'),
(4, 'Sandro Botticelli', 'La nascita di Venere', 'https://en.wikipedia.org/wiki/The_Birth_of_Venus');

-- Dumping data for table `voti`
INSERT INTO `votes` (`id`, `artist_id`, `score`) VALUES
(1, 1, 10),
(2, 2, 8),
(3, 3, 9),
(4, 4, 7);
