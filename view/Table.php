<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>DataBases</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link rel="stylesheet" href="view/css/style.css">
</head>
	<body class="bg-secondary">
		<div class="container bg-light p-3 pt-0 base rounded">

			<div class="row">
					<div class="col-6 my-4 do">
						<h3>Оберіть файл БД (.db3)</h3>
					</div>
					<div class="col-6 my-4 d-flex justify-content-end">
						<form method="post" action="index.php" enctype="multipart/form-data">
							<div class="container">
								<div class="row">
									<div class="col-7"><input type="file" name="db"></div>
									<div class="col-5"><button class="btn-dark rounded px-5 py-2" type="submit">Open</button></div>
								</div>
							</div>
							
							
						</form>
					</div>
			</div>
			<div class="row justify-content-center base__table">
					<div class="col-12">
						<table id="table" class="table table-bordered">
							<thead id="columnsName">
								<?php for($i = 0; $i < $columnCount; $i++): ?>
									<th scope="col"><?php echo $result->columnName($i) ?></th>
								<?php endfor; ?>
							</thead>
							<tbody>
								<?php while($row = $result->fetchArray()): ?>
									<tr id="<?php echo $row[0] ?>" class="not-select">
										<?php for($i = 0; $i < $columnCount; $i++): ?>
											<td>
												<?php echo $row[$result->columnName($i)] ?>
											</td>
										<?php endfor; ?>
									</tr>
								<?php endwhile; ?>
							</tbody>
						</table>
					</div>
			</div>
			<div class="row justify-content-end">
					<div class="d-flex px-3 my-3">
						<button id="selectAll" class="btn-dark px-5 py-2 mr-3 text-uppercase rounded">Select all</button>
						<button id="import" class="btn-dark px-5 py-2 text-uppercase rounded">Import to ADIF</button> 
					</div>
				</div>

		</div>
	</body>
</html>

<script src="view/js/selectAll.js"></script>
<script src="view/js/manualSelect.js"></script>
<script src="modules/importFile.js"></script>