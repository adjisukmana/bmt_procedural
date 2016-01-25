SELECT * FROM nasabah n JOIN nasabah_variable nv ON n.id_nasabah = nv.id_nasabah
                        JOIN variable v ON v.id_variable = nv.id_variable

SELECT n.id_nasabah, n.nama_nasabah, v.nama_variable, nv.value, n.kelancaran  FROM nasabah n JOIN nasabah_variable nv ON n.id_nasabah = nv.id_nasabah
JOIN variable v ON v.id_variable = nv.id_variable

step :

INSERT variable
INSERT INTO `aoeu`.`variable` (`id_variable`, `nama_variable`) VALUES ('6', 'karakter');

INSERT variable_value
INSERT INTO `aoeu`.`variable_value` (`id_variable`, `variable_value`) VALUES ('6', 'baik'), ('6', 'buruk');

INSERT nasabah_variable
INSERT INTO `aoeu`.`nasabah_variable` (`id_nasabah`, `id_variable`, `value`) VALUES ('1', '6', 'baik');
INSERT INTO `aoeu`.`nasabah_variable` (`id_nasabah`, `id_variable`, `value`) VALUES ('2', '6', 'buruk');