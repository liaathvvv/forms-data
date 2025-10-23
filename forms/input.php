<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Form Input Data Siswa</title>
  <style>
    body {
      background: linear-gradient(to right, #e273f1ff, #acb6e5);
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
      margin: 0;
    }

    .form-container {
      background-color: #fff;
      border-radius: 12px;
      box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
      width: 700px;
      height: 300px;
      padding: 30px;
      box-sizing: border-box;
      border: 2px solid #007BFF;
      display: flex;
      gap: 30px;
    }

    h1 {
      width: 100%;
      text-align: center;
      color: #fffffdff;
      margin: 0 0 20px 0;
      flex-basis: 100%;
    }

    form {
      display: flex;
      flex: 1;
      gap: 20px;
    }

    .column {
      flex: 1;
      display: flex;
      flex-direction: column;
    }

    label {
      font-weight: bold;
      margin-top: 10px;
      color: #333;
    }

    input[type="text"],
    select,
    textarea {
      padding: 8px;
      margin-top: 5px;
      border-radius: 5px;
      border: 1px solid #ccc;
      font-size: 14px;
      box-sizing: border-box;
      width: 100%;
    }

    textarea {
      resize: vertical;
    }

    .gender {
      margin-top: 5px;
      display: flex;
      gap: 15px;
    }

    .gender label {
      font-weight: normal;
      color: #555;
    }

    button {
      margin-top: auto;
      padding: 12px;
      background-color: #007BFF;
      color: white;
      border: none;
      border-radius: 6px;
      font-size: 16px;
      cursor: pointer;
      transition: background-color 0.3s ease;
      width: 100%;
    }

    button:hover {
      background-color: #0056b3;
    }

    .result {
      margin-top: 20px;
      padding: 15px;
      border: 1px solid #007BFF;
      border-radius: 8px;
      background-color: #e6f0ff;
      color: #004085;
      font-size: 14px;
      line-height: 1.4;
      width: 700px;
      box-sizing: border-box;
    }
  </style>
</head>
<body>

<!-- <img src="kth.jpeg" alt="kth"> -->
  <div>
    <h1>Form Input Data Siswa</h1>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $nama = htmlspecialchars(trim($_POST['nama']));
        $nisn = htmlspecialchars(trim($_POST['nisn']));
        $gender = htmlspecialchars($_POST['gender']);
        $agama = htmlspecialchars($_POST['agama']);
        $alamat = htmlspecialchars(trim($_POST['alamat']));

        echo '<div class="result">';
        echo '<strong>Data yang Anda Masukkan:</strong><br>';
        echo "Nama: $nama <br>";
        echo "NISN: $nisn <br>";
        echo "Jenis Kelamin: $gender <br>";
        echo "Agama: $agama <br>";
        echo "Alamat: $alamat <br>";
        echo '</div>';
    }
    ?>

    <div class="form-container">
      <form action="" method="POST">
        <div class="column">
          <label for="nama">Nama Lengkap:</label>
          <input type="text" id="nama" name="nama" required value="<?php if(isset($nama)) echo $nama; ?>" />

          <label for="nisn">NISN:</label>
          <input type="text" id="nisn" name="nisn" required value="<?php if(isset($nisn)) echo $nisn; ?>" />

          <label>Jenis Kelamin:</label>
          <div class="gender">
            <label><input type="radio" name="gender" value="Laki-laki" required
              <?php if(isset($gender) && $gender == 'Laki-laki') echo 'checked'; ?> /> Laki-laki</label>
            <label><input type="radio" name="gender" value="Perempuan" required
              <?php if(isset($gender) && $gender == 'Perempuan') echo 'checked'; ?> /> Perempuan</label>
          </div>
        </div>

        <div class="column">
          <label for="agama">Agama:</label>
          <select id="agama" name="agama" required>
            <option value="">-- Pilih Agama --</option>
            <?php
            $list_agama = ['Islam', 'Kristen', 'Katolik', 'Hindu', 'Buddha', 'Konghucu', 'Atheis'];
            foreach ($list_agama as $a) {
              $selected = (isset($agama) && $agama == $a) ? 'selected' : '';
              echo "<option value=\"$a\" $selected>$a</option>";
            }
            ?>
          </select>

          <label for="alamat">Alamat:</label>
          <textarea id="alamat" name="alamat" rows="4" required><?php if(isset($alamat)) echo $alamat; ?></textarea>

          <button type="submit">Kirim Data</button>
        </div>
      </form>
    </div>
  </div>

</body>
</html>
