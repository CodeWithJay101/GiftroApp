-- Creating the database
CREATE DATABASE webdev CHARACTER SET utf8 COLLATE utf8mb3_general_ci;

USE webdev;

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `catId` int(11) NOT NULL,
  `catName` varchar(130) NOT NULL,
  `catImg` varchar(130) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`catId`, `catName`, `catImg`) VALUES
(1, 'Toys', 'https://websitedemos.net/gift-shop-04/wp-content/uploads/sites/919/2021/07/toys-01.jpg'),
(2, 'Accesories', 'https://websitedemos.net/gift-shop-04/wp-content/uploads/sites/919/2021/07/accessories.jpg'),
(3, 'Clothing', 'https://websitedemos.net/gift-shop-04/wp-content/uploads/sites/919/2021/07/clothing.jpg'),
(4, 'Handbags', 'https://websitedemos.net/gift-shop-04/wp-content/uploads/sites/919/2021/07/handbags.jpg'),
(5, 'Wallets', 'https://websitedemos.net/gift-shop-04/wp-content/uploads/sites/919/2021/07/wallets.jpg'),
(6, 'Stationaries', 'https://websitedemos.net/gift-shop-04/wp-content/uploads/sites/919/2021/07/office.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `details` varchar(1000) DEFAULT NULL,
  `phoneno` int(12) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `itemsId` int(11) NOT NULL,
  `itemsImg` varchar(1000) NOT NULL,
  `itemsName` varchar(200) NOT NULL,
  `itemsDesc` mediumtext NOT NULL,
  `itemsPrice` decimal(10,2) NOT NULL,
  `isNew` bit(1) NOT NULL DEFAULT b'0',
  `catId` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`itemsId`, `itemsImg`, `itemsName`, `itemsDesc`, `itemsPrice`, `isNew`, `catId`) VALUES
(1, 'https://websitedemos.net/gift-shop-04/wp-content/uploads/sites/919/2021/08/accessories-06.jpg', 'Sunglasses', 'This is a pair of sunglasses.', 19.50, b'1', 2),
(2, 'https://websitedemos.net/gift-shop-04/wp-content/uploads/sites/919/2021/07/accessories-02.jpg', 'Perfume', 'This is a perfume.', 12.50, b'0', 2),
(3, 'https://websitedemos.net/gift-shop-04/wp-content/uploads/sites/919/2021/07/accessories-03.jpg', 'Black Watch', 'This is a black watch.', 12.90, b'0', 2),
(4, 'https://websitedemos.net/gift-shop-04/wp-content/uploads/sites/919/2021/08/accessories-04.jpg', 'Silver watch', 'This is a silver watch.', 12.50, b'0', 2),
(5, 'https://websitedemos.net/gift-shop-04/wp-content/uploads/sites/919/2021/08/accessories-06.jpg', 'Oval glasses', 'This is an oval glasses.', 16.00, b'0', 2),
(6, 'https://websitedemos.net/gift-shop-04/wp-content/uploads/sites/919/2021/07/accessories-01.jpg', 'Lipstick & Mascara', 'This is a lipstick and mascara.', 12.00, b'0', 2),
(7, 'https://websitedemos.net/gift-shop-04/wp-content/uploads/sites/919/2021/08/clothing-01.jpg', 'Blue Floral Spot Shirt', 'This is a blue floral spot shirt.', 135.00, b'0', 3),
(8, 'https://websitedemos.net/gift-shop-04/wp-content/uploads/sites/919/2021/08/clothing-05.jpg', 'Denim Original Fit Blue', 'This is a denim original fit blue jeans.', 95.00, b'0', 3),
(9, 'https://websitedemos.net/gift-shop-04/wp-content/uploads/sites/919/2021/08/clothing-03.jpg', 'Designer Skinny Suit Jacket', 'This is a designer skinny suit jacket.', 175.00, b'0', 3),
(10, 'https://websitedemos.net/gift-shop-04/wp-content/uploads/sites/919/2021/07/personalized-03.jpg', 'Green T-shirt', 'This is a green T-shirt.', 11.00, b'0', 3),
(11, 'https://websitedemos.net/gift-shop-04/wp-content/uploads/sites/919/2021/08/clothing-04.jpg', 'Suit Jacket in Camel', 'This is a suit jacket in camel.', 195.00, b'0', 3),
(12, 'https://websitedemos.net/gift-shop-04/wp-content/uploads/sites/919/2021/08/clothing-02.jpg', 'White Sateen Slim Fit Shirt', 'This is a white sateen slim fit shirt.', 95.00, b'0', 3),
(13, 'https://websitedemos.net/gift-shop-04/wp-content/uploads/sites/919/2021/08/handbag-03.jpg', 'Baguette Bag in Chocolate', 'This is a baguette bag in chocolate color.', 140.00, b'0', 4),
(14, 'https://websitedemos.net/gift-shop-04/wp-content/uploads/sites/919/2021/08/handbag-06.jpg', 'Island Double Comp Handbag in Silver', 'This is an island double comp handbag in silver color.', 249.00, b'0', 4),
(15, 'https://websitedemos.net/gift-shop-04/wp-content/uploads/sites/919/2021/08/handbag-04.jpg', 'Organic Leather Handbag in Red', 'This is an organic leather handbag in red.', 125.00, b'0', 4),
(16, 'https://websitedemos.net/gift-shop-04/wp-content/uploads/sites/919/2021/08/handbag-01.jpg', 'Pink Quilted Cross Body Handbag', 'This is a pink quilted cross body handbag.', 199.90, b'0', 4),
(17, 'https://websitedemos.net/gift-shop-04/wp-content/uploads/sites/919/2021/08/handbag-02.jpg', 'Quilted Leather Handbag in Brown', 'This is a quilted leather handbag in brown.', 199.00, b'0', 4),
(18, 'https://websitedemos.net/gift-shop-04/wp-content/uploads/sites/919/2021/08/handbag-05.jpg', 'Quilted Puffed Leather Handbag', 'This is a quilted puffed leather handbag.', 290.00, b'0', 4),
(19, 'https://websitedemos.net/gift-shop-04/wp-content/uploads/sites/919/2021/07/personalized-02.jpg', 'Office Envelopes and Pencil Set', 'This is a office envelopes and pencil set.', 12.50, b'0', 6),
(20, 'https://websitedemos.net/gift-shop-04/wp-content/uploads/sites/919/2021/07/stationery-01.jpg', 'Office Notebook and Pencil', 'This is a office notebook with pencil.', 13.90, b'0', 6),
(21, 'https://websitedemos.net/gift-shop-04/wp-content/uploads/sites/919/2021/07/personalized-01.jpg', 'Office Notebook and Pen', 'This is a office notebook and pen set.', 13.25, b'0', 6),
(22, 'https://websitedemos.net/gift-shop-04/wp-content/uploads/sites/919/2021/07/stationery-02.jpg', 'Contour Standard Ballpen', 'This is a contour standard ballpen. ', 13.90, b'0', 6),
(23, 'https://websitedemos.net/gift-shop-04/wp-content/uploads/sites/919/2021/08/stationery-03.jpg', 'Stainless Steel Office Scissors', 'This is a stainless steel office scissors', 15.50, b'0', 6),
(24, 'https://websitedemos.net/gift-shop-04/wp-content/uploads/sites/919/2021/08/stationery-04.jpg', 'White Liquid Washable Glue', 'This is a white liquid washable glue.', 12.50, b'0', 6),
(25, 'https://websitedemos.net/gift-shop-04/wp-content/uploads/sites/919/2021/08/toy-05.jpg', 'Adventure Power Dinosaur Toy', 'This is a adventure power dinosaur toy.', 21.75, b'0', 1),
(26, 'https://websitedemos.net/gift-shop-04/wp-content/uploads/sites/919/2021/07/toy-01.jpg', 'Kid Cartoon Character Toy', 'This is a kid cartoon character toy.', 13.90, b'1', 1),
(27, 'https://websitedemos.net/gift-shop-04/wp-content/uploads/sites/919/2021/08/toy-03.jpg', 'Kid Cartoon Character Toy', 'This is a kid cartoon character toy.', 26.25, b'0', 1),
(28, 'https://websitedemos.net/gift-shop-04/wp-content/uploads/sites/919/2021/08/toy-04.jpg', 'Luigi Feature Plastic Figure', 'This is a Luigi feature plastic figure.', 19.75, b'0', 1),
(29, 'https://websitedemos.net/gift-shop-04/wp-content/uploads/sites/919/2021/08/toy-02.jpg', 'Minion Small Action Figure', 'This is a Minion small action figure.', 27.50, b'0', 1),
(30, 'https://websitedemos.net/gift-shop-04/wp-content/uploads/sites/919/2021/08/toy-06.jpg', 'Super Mario Feature Figure', 'This is a Super Mario feature figure.', 22.50, b'0', 1),
(31, 'https://websitedemos.net/gift-shop-04/wp-content/uploads/sites/919/2021/07/personalized-04.jpg', 'Black Organic Leather Wallet', 'This is a black organic leather wallet.', 19.50, b'0', 5),
(32, 'https://websitedemos.net/gift-shop-04/wp-content/uploads/sites/919/2021/08/wallet-05.jpg', 'Black Real Leather Wallet', 'This is a black real leather wallet.', 120.00, b'0', 5),
(33, 'https://websitedemos.net/gift-shop-04/wp-content/uploads/sites/919/2021/08/wallet-03.jpg', 'Light Brown Real Leather Credit Card Case', 'This is a light brown real leather credit card case.', 45.50, b'0', 5),
(34, 'https://websitedemos.net/gift-shop-04/wp-content/uploads/sites/919/2021/07/wallet-01.jpg', 'Men\'s Black Sport Wallet', 'This is a men\'s black sport wallet.', 10.50, b'1', 5),
(35, 'https://websitedemos.net/gift-shop-04/wp-content/uploads/sites/919/2021/07/wallet-02.jpg', 'Red Real Leather Wallet', 'This is a red real leather wallet.', 13.90, b'0', 5),
(36, 'https://websitedemos.net/gift-shop-04/wp-content/uploads/sites/919/2021/08/wallet-04.jpg', 'Tyler Brown Leather Wallet', 'This is a Tyler Brown leather wallet.', 105.50, b'0', 5);

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE `transaction` (
  `transactionId` int(11) NOT NULL,
  `usersId` int(11) DEFAULT NULL,
  `transactionDetails` longtext DEFAULT NULL,
  `transactionTotal` decimal(10,2) DEFAULT NULL,
  `transactionShipping` varchar(200) DEFAULT NULL,
  `transactionPayment` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `usersId` int(11) NOT NULL,
  `usersName` varchar(130) NOT NULL,
  `usersEmail` varchar(130) NOT NULL,
  `usersPwd` varchar(130) NOT NULL,
  `usersCart` longtext DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`catId`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`itemsId`),
  ADD KEY `catId` (`catId`);

--
-- Indexes for table `transaction`
--
ALTER TABLE `transaction`
  ADD PRIMARY KEY (`transactionId`),
  ADD KEY `usersId` (`usersId`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`usersId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `catId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `itemsId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `transaction`
--
ALTER TABLE `transaction`
  MODIFY `transactionId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `usersId` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `items`
--
ALTER TABLE `items`
  ADD CONSTRAINT `items_ibfk_1` FOREIGN KEY (`catId`) REFERENCES `categories` (`catId`);

--
-- Constraints for table `transaction`
--
ALTER TABLE `transaction`
  ADD CONSTRAINT `transaction_ibfk_1` FOREIGN KEY (`usersId`) REFERENCES `users` (`usersId`);
COMMIT;
