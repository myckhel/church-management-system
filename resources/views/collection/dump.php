// FLOT LINE CHART
// =================================================================
// Require Flot Charts
// -----------------------------------------------------------------
// http://www.flotcharts.org/
// =================================================================

/*var menn = [ [1, 1436], [2, 1395], [3, 1479], [4, 1595], [5, 1509], [6, 1550], [7, 1480], [8, 1390], [9, 1550], [10, 1400], [11, 1590], [12, 1436]],
            visitorr = [ [1, 1124], [2, 1183], [3, 1126], [4, 887], [5, 754], [6, 865], [7, 889], [8, 854], [9, 958], [10, 925], [11, 1056], [12, 984]],
            womenr = [ [1, 1024], [2, 1283], [3, 1126], [4, 487], [5, 754], [6, 565], [7, 889], [8, 814], [9, 918], [10, 825], [11, 456], [12, 1084]];;*/

            <?php $months = ['Mon', 'Tue', 'Wed','Thur','Fri','Sat','Sun']; ?>
            <?php $members = ['so','sdo','o'];//,'d', 't', 'ff']; ?>
            <?php

              foreach ($members as $member){
                echo "var $member = [";

                foreach ($months as $k => $month){
                  $month_num = $k+1;
                  $found = false;
                  foreach($collections3 as $attendance){

                    if ($attendance->month == ($k+1) ){
                      $found = true;
                      echo'['.$month_num.','.$attendance->$member.' ],';
                    }
                  }

                  if (!$found){

                      echo "[$month_num,0],";

                  }
                }
                echo "]\n";
              }

            ?>

              var plot = $.plot('#demo-flot-line2', [
                  {
                      label: 'Special Offering',
                      data: so,
                      lines: {
                          show: true,
                          lineWidth: 1,
                          fill: false
                      },
                      points: {
                          show: true,
                          radius: 2
                      }
                      },
                  {
                      label: 'Seed Offering',
                      data: sdo,
                      lines: {
                          show: true,
                          lineWidth: 1,
                          fill: false
                      },
                      points: {
                          show: true,
                          radius: 2
                      }
                                  },
                                  {
                      label: 'Offering',
                      data: o,
                      lines: {
                          show: true,
                          lineWidth: 1,
                          fill: false
                      },
                      points: {
                          show: true,
                          radius: 2
                      }
                      }
                  ], {
                  series: {
                      lines: {
                          show: true
                      },
                      points: {
                          show: true
                      },
                      shadowSize: 0 // Drawing is faster without shadows
                  },
                  colors: ['#b5bfc5', 'red','#177bbb'],
                  legend: {
                      show: true,
                      position: 'nw',
                      margin: [15, 0]
                  },
                  grid: {
                      borderWidth: 0,
                      hoverable: true,
                      clickable: true
                  },
                  yaxis: {
                      ticks: 5,
                      tickColor: 'rgba(0,0,0,.1)'
                  },
                  xaxis: {
                      ticks: 7,
                      tickColor: 'transparent'
                  },
                  tooltip: {
                      show: true,
                      content: 'x: %x, y: %y'
                  }
              });

              <script>

              	// FLOT LINE CHART
              	// =================================================================
              	// Require Flot Charts
              	// -----------------------------------------------------------------
              	// http://www.flotcharts.org/
              	// =================================================================

              	/*var menn = [ [1, 1436], [2, 1395], [3, 1479], [4, 1595], [5, 1509], [6, 1550], [7, 1480], [8, 1390], [9, 1550], [10, 1400], [11, 1590], [12, 1436]],
              							visitorr = [ [1, 1124], [2, 1183], [3, 1126], [4, 887], [5, 754], [6, 865], [7, 889], [8, 854], [9, 958], [10, 925], [11, 1056], [12, 984]],
              							womenr = [ [1, 1024], [2, 1283], [3, 1126], [4, 487], [5, 754], [6, 565], [7, 889], [8, 814], [9, 918], [10, 825], [11, 456], [12, 1084]];;*/


              <?php $months = ['Jan', 'Feb', 'Mar','Apr','May','Jun','Jul','Aug','Sept','Oct','Now','Dec']; ?>
              <?php $members = ['so','sdo','o'];//,'d', 't', 'ff']; ?>
              <?php

              	foreach ($members as $member){
              		echo "var $member = [";

              		foreach ($months as $k => $month){
              			$month_num = $k+1;
              			$found = false;
              			foreach($collections as $collection){

              				if ($collection->month == ($k+1) ){
              					$found = true;
              					echo'['.$month_num.','.$collection->$member.' ],';
              				}
              			}

              			if (!$found){

              					echo "[$month_num,0],";

              			}
              		}
              		echo "]\n";
              	}

              ?>

              	var plot = $.plot('#demo-flot-line', [
              			{
              					label: 'Special Offering',
              					data: so,
              					lines: {
              							show: true,
              							lineWidth: 1,
              							fill: false
              					},
              					points: {
              							show: true,
              							radius: 2
              					}
              					},
              			{
              					label: 'Seed Offering',
              					data: offerring,
              					lines: {
              							show: true,
              							lineWidth: 1,
              							fill: false
              					},
              					points: {
              							show: true,
              							radius: 2
              					}
              											},
              											{
              					label: 'Offering',
              					data: o,
              					lines: {
              							show: true,
              							lineWidth: 1,
              							fill: false
              					},
              					points: {
              							show: true,
              							radius: 2
              					}
              					}
              			], {
              			series: {
              					lines: {
              							show: true
              					},
              					points: {
              							show: true
              					},
              					shadowSize: 0 // Drawing is faster without shadows
              			},
              			colors: ['#b5bfc5', 'red','#177bbb'],
              			legend: {
              					show: true,
              					position: 'nw',
              					margin: [15, 0]
              			},
              			grid: {
              					borderWidth: 0,
              					hoverable: true,
              					clickable: true
              			},
              			yaxis: {
              					ticks: 5,
              					tickColor: 'rgba(0,0,0,.1)'
              			},
              			xaxis: {
              					ticks: 7,
              					tickColor: 'transparent'
              			},
              			tooltip: {
              					show: true,
              					content: 'x: %x, y: %y'
              			}
              	});

              	// FLOT LINE CHART
              	// =================================================================
              	// Require Flot Charts
              	// -----------------------------------------------------------------
              	// http://www.flotcharts.org/
              	// =================================================================

              	/*var menn = [ [1, 1436], [2, 1395], [3, 1479], [4, 1595], [5, 1509], [6, 1550], [7, 1480], [8, 1390], [9, 1550], [10, 1400], [11, 1590], [12, 1436]],
              							visitorr = [ [1, 1124], [2, 1183], [3, 1126], [4, 887], [5, 754], [6, 865], [7, 889], [8, 854], [9, 958], [10, 925], [11, 1056], [12, 984]],
              							womenr = [ [1, 1024], [2, 1283], [3, 1126], [4, 487], [5, 754], [6, 565], [7, 889], [8, 814], [9, 918], [10, 825], [11, 456], [12, 1084]];;*/

              							<?php $months = ['Mon', 'Tue', 'Wed','Thur','Fri','Sat','Sun']; ?>
              							<?php $members = ['tithe','offering','other'];//,'d', 't', 'ff']; ?>
              							<?php

              								foreach ($members as $member){
              									echo "var $member = [";

              									foreach ($months as $k => $month){
              										$month_num = $k+1;
              										$found = false;
              										foreach($collections3 as $attendance){

              											if ($attendance->month == ($k+1) ){
              												$found = true;
              												echo'['.$month_num.','.$attendance->$member.' ],';
              											}
              										}

              										if (!$found){

              												echo "[$month_num,0],";

              										}
              									}
              									echo "]\n";
              								}

              							?>

              								var plot = $.plot('#demo-flot-line2', [
              										{
              												label: 'Special Offering',
              												data: tithe,
              												lines: {
              														show: true,
              														lineWidth: 1,
              														fill: false
              												},
              												points: {
              														show: true,
              														radius: 2
              												}
              												},
              										{
              												label: 'Seed Offering',
              												data: offerring,
              												lines: {
              														show: true,
              														lineWidth: 1,
              														fill: false
              												},
              												points: {
              														show: true,
              														radius: 2
              												}
              																		},
              																		{
              												label: 'Offering',
              												data: o,
              												lines: {
              														show: true,
              														lineWidth: 1,
              														fill: false
              												},
              												points: {
              														show: true,
              														radius: 2
              												}
              												}
              										], {
              										series: {
              												lines: {
              														show: true
              												},
              												points: {
              														show: true
              												},
              												shadowSize: 0 // Drawing is faster without shadows
              										},
              										colors: ['#b5bfc5', 'red','#177bbb'],
              										legend: {
              												show: true,
              												position: 'nw',
              												margin: [15, 0]
              										},
              										grid: {
              												borderWidth: 0,
              												hoverable: true,
              												clickable: true
              										},
              										yaxis: {
              												ticks: 5,
              												tickColor: 'rgba(0,0,0,.1)'
              										},
              										xaxis: {
              												ticks: 7,
              												tickColor: 'transparent'
              										},
              										tooltip: {
              												show: true,
              												content: 'x: %x, y: %y'
              										}
              								});

              // FLOT BAR CHART
              	// =================================================================
              	// Require Flot Charts
              	// -----------------------------------------------------------------
              	// http://www.flotcharts.org/
              	// =================================================================
              	var data = [[1, 10], [2, 8], [3, 4], [4, 13], [5, 17], [6, 9], [7, 12], [8, 15], [9, 9], [10, 15]];
              var data = [

              <?php $months = ['Jan', 'Feb', 'Mar','Apr','May','Jun','Jul','Aug','Sept','Oct','Now','Dec']; ?>
              <?php
              foreach ($months as $k => $month){
              	$month_num = $k+1;
              	$found = false;
              	foreach($attendances2 as $attendance){

              		if ($attendance->month == ($k+1) ){
              			$found = true;
              			echo"[$month_num,$attendance->total ],";
              		}
              	}

              	if (!$found){

              			echo "[$month_num,0],";

              	}
              }

              ?>
              ];

              	$.plot('#demo-flot-bar', [data], {
              			series: {
              					bars: {
              							show: true,
              							barWidth: 0.6,
              							fill: true,
              							fillColor: {
              									colors: [{
              											opacity: 0.9
              									}, {
              											opacity: 0.9
              									}]
              							}
              					}
              			},
              			colors: ['#9B59B6'],
              			yaxis: {
              					ticks: 5,
              					tickColor: 'rgba(0,0,0,.1)'
              			},
              			xaxis: {
              					ticks: 7,
              					tickColor: 'transparent'
              			},
              			grid: {
              					hoverable: true,
              					clickable: true,
              					tickColor: '#eeeeee',
              					borderWidth: 0
              			},
              			legend: {
              					show: true,
              					position: 'nw'
              			},
              			tooltip: {
              					show: true,
              					content: 'x: %x, y: %y'
              			}
              	});

              	// FLOT BAR CHART
              		// =================================================================
              		// Require Flot Charts
              		// -----------------------------------------------------------------
              		// http://www.flotcharts.org/
              		// =================================================================
              		var data = [1, 2, 3, 4, 5, 6, 7];
              	var data = [

              	<?php $weeks = ['Mon', 'Tue', 'Wed','Thur','Fri','Sat','Sun']; ?>
              	<?php
              	foreach ($weeks as $k => $week){
              		$week_num = $k+1;
              		$found = false;
              		foreach($attendances4 as $attendance){

              			if ($attendance->month == ($k+1) ){
              				$found = true;
              				echo"[$week_num,$attendance->total ],";
              			}
              		}

              		if (!$found){

              				echo "[$week_num,0],";

              		}
              	}

              	?>
              	];

              		$.plot('#demo-flot-bar2', [data], {
              				series: {
              						bars: {
              								show: true,
              								barWidth: 0.6,
              								fill: true,
              								fillColor: {
              										colors: [{
              												opacity: 0.9
              										}, {
              												opacity: 0.9
              										}]
              								}
              						}
              				},
              				colors: ['#9B59B6'],
              				yaxis: {
              						ticks: 5,
              						tickColor: 'rgba(0,0,0,.1)'
              				},
              				xaxis: {
              						ticks: 7,
              						tickColor: 'transparent'
              				},
              				grid: {
              						hoverable: true,
              						clickable: true,
              						tickColor: '#eeeeee',
              						borderWidth: 0
              				},
              				legend: {
              						show: true,
              						position: 'nw'
              				},
              				tooltip: {
              						show: true,
              						content: 'x: %x, y: %y'
              				}
              		});*/
              	</script>

                /*
                  ATTENDANCE DUMPED
                */


                    // FLOT LINE CHART
                    // =================================================================
                    // Require Flot Charts
                    // -----------------------------------------------------------------
                    // http://www.flotcharts.org/
                    // =================================================================

                    /*var menn = [ [1, 1436], [2, 1395], [3, 1479], [4, 1595], [5, 1509], [6, 1550], [7, 1480], [8, 1390], [9, 1550], [10, 1400], [11, 1590], [12, 1436]],
                                visitorr = [ [1, 1124], [2, 1183], [3, 1126], [4, 887], [5, 754], [6, 865], [7, 889], [8, 854], [9, 958], [10, 925], [11, 1056], [12, 984]],
                                womenr = [ [1, 1024], [2, 1283], [3, 1126], [4, 487], [5, 754], [6, 565], [7, 889], [8, 814], [9, 918], [10, 825], [11, 456], [12, 1084]];;*/


                	<?php $months = ['Jan', 'Feb', 'Mar','Apr','May','Jun','Jul','Aug','Sept','Oct','Now','Dec']; ?>
                	<?php $members = ['male','female','children']; ?>
                	<?php

                		foreach ($members as $member){
                			echo "var $member = [";

                			foreach ($months as $k => $month){
                				$month_num = $k+1;
                				$found = false;
                				foreach($attendances as $attendance){

                					if ($attendance->month == ($k+1) ){
                						$found = true;
                						echo'['.$month_num.','.$attendance->$member.' ],';
                					}
                				}

                				if (!$found){

                						echo "[$month_num,0],";

                				}
                			}
                			echo "]\n";
                		}

                	?>

                    var plot = $.plot('#demo-flot-line', [
                        {
                            label: 'Men',
                            data: male,
                            lines: {
                                show: true,
                                lineWidth: 1,
                                fill: false
                            },
                            points: {
                                show: true,
                                radius: 2
                            }
                            },
                        {
                            label: 'Women',
                            data: female,
                            lines: {
                                show: true,
                                lineWidth: 1,
                                fill: false
                            },
                            points: {
                                show: true,
                                radius: 2
                            }
                                        },
                                        {
                            label: 'Children',
                            data: children,
                            lines: {
                                show: true,
                                lineWidth: 1,
                                fill: false
                            },
                            points: {
                                show: true,
                                radius: 2
                            }
                            }
                        ], {
                        series: {
                            lines: {
                                show: true
                            },
                            points: {
                                show: true
                            },
                            shadowSize: 0 // Drawing is faster without shadows
                        },
                        colors: ['#b5bfc5', 'red','#177bbb'],
                        legend: {
                            show: true,
                            position: 'nw',
                            margin: [15, 0]
                        },
                        grid: {
                            borderWidth: 0,
                            hoverable: true,
                            clickable: true
                        },
                        yaxis: {
                            ticks: 5,
                            tickColor: 'rgba(0,0,0,.1)'
                        },
                        xaxis: {
                            ticks: 7,
                            tickColor: 'transparent'
                        },
                        tooltip: {
                            show: true,
                            content: 'x: %x, y: %y'
                        }
                    });

                		// FLOT LINE CHART
                		// =================================================================
                		// Require Flot Charts
                		// -----------------------------------------------------------------
                		// http://www.flotcharts.org/
                		// =================================================================

                		/*var menn = [ [1, 1436], [2, 1395], [3, 1479], [4, 1595], [5, 1509], [6, 1550], [7, 1480], [8, 1390], [9, 1550], [10, 1400], [11, 1590], [12, 1436]],
                								visitorr = [ [1, 1124], [2, 1183], [3, 1126], [4, 887], [5, 754], [6, 865], [7, 889], [8, 854], [9, 958], [10, 925], [11, 1056], [12, 984]],
                								womenr = [ [1, 1024], [2, 1283], [3, 1126], [4, 487], [5, 754], [6, 565], [7, 889], [8, 814], [9, 918], [10, 825], [11, 456], [12, 1084]];;*/


                		<?php //$weeks = ['Mon', 'Tue', 'Wed','Thur','Fri','Sat','Sun', 'anum']; ?>
                		<?php $weeks = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17,
                          18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28, 29, 30, 31, 32, 33, 34,
                          35, 36, 37, 38, 39, 40, 41, 42, 43, 44, 45, 46, 47, 48, 49, 50, 51,
                          52,]; ?>
                		<?php $members = ['male','female','children']; ?>
                		<?php

                		foreach ($members as $member){
                			echo "var $member = [";

                			foreach ($weeks as $k => $week){
                				$week_num = $k+1;
                				$found = false;
                				foreach($attendances3 as $attendance){

                					if ($attendance->week == ($k+1) ){
                						$found = true;
                						echo'['.$week_num.','.$attendance->$member.' ],';
                					}
                				}

                				if (!$found){

                						echo "[$week_num,0],";

                				}
                			}
                			echo "]\n";
                		}

                		?>

                		var plot = $.plot('#demo-flot-line2', [
                				{
                						label: 'Men',
                						data: male,
                						lines: {
                								show: true,
                								lineWidth: 1,
                								fill: false
                						},
                						points: {
                								show: true,
                								radius: 2
                						}
                						},
                				{
                						label: 'Women',
                						data: female,
                						lines: {
                								show: true,
                								lineWidth: 1,
                								fill: false
                						},
                						points: {
                								show: true,
                								radius: 2
                						}
                												},
                												{
                						label: 'Children',
                						data: children,
                						lines: {
                								show: true,
                								lineWidth: 1,
                								fill: false
                						},
                						points: {
                								show: true,
                								radius: 2
                						}
                						}
                				], {
                				series: {
                						lines: {
                								show: true
                						},
                						points: {
                								show: true
                						},
                						shadowSize: 0 // Drawing is faster without shadows
                				},
                				colors: ['#b5bfc5', 'red','#177bbb'],
                				legend: {
                						show: true,
                						position: 'nw',
                						margin: [15, 0]
                				},
                				grid: {
                						borderWidth: 0,
                						hoverable: true,
                						clickable: true
                				},
                				yaxis: {
                						ticks: 5,
                						tickColor: 'rgba(0,0,0,.1)'
                				},
                				xaxis: {
                						ticks: 7,
                						tickColor: 'transparent'
                				},
                				tooltip: {
                						show: true,
                						content: 'x: %x, y: %y'
                				}
                		});


                	// FLOT BAR CHART
                    // =================================================================
                    // Require Flot Charts
                    // -----------------------------------------------------------------
                    // http://www.flotcharts.org/
                    // =================================================================
                    var data = [[1, 10], [2, 8], [3, 4], [4, 13], [5, 17], [6, 9], [7, 12], [8, 15], [9, 9], [10, 15]];
                	var data = [

                	<?php $months = ['Jan', 'Feb', 'Mar','Apr','May','Jun','Jul','Aug','Sept','Oct','Now','Dec']; ?>
                	<?php
                	foreach ($months as $k => $month){
                		$month_num = $k+1;
                		$found = false;
                		foreach($attendances2 as $attendance){

                			if ($attendance->month == ($k+1) ){
                				$found = true;
                				echo"[$month_num,$attendance->total ],";
                			}
                		}

                		if (!$found){

                				echo "[$month_num,0],";

                		}
                	}

                	?>
                	];

                    $.plot('#demo-flot-bar', [data], {
                        series: {
                            bars: {
                                show: true,
                                barWidth: 0.6,
                                fill: true,
                                fillColor: {
                                    colors: [{
                                        opacity: 0.9
                                    }, {
                                        opacity: 0.9
                                    }]
                                }
                            }
                        },
                        colors: ['#9B59B6'],
                        yaxis: {
                            ticks: 5,
                            tickColor: 'rgba(0,0,0,.1)'
                        },
                        xaxis: {
                            ticks: 7,
                            tickColor: 'transparent'
                        },
                        grid: {
                            hoverable: true,
                            clickable: true,
                            tickColor: '#eeeeee',
                            borderWidth: 0
                        },
                        legend: {
                            show: true,
                            position: 'nw'
                        },
                        tooltip: {
                            show: true,
                            content: 'x: %x, y: %y'
                        }
                    });

                		// FLOT BAR CHART
                			// =================================================================
                			// Require Flot Charts
                			// -----------------------------------------------------------------
                			// http://www.flotcharts.org/
                			// =================================================================
                			var data = [1, 2, 3, 4, 5, 6, 7];
                		var data = [

                		<?php $weeks = [[1,'Mon'], [2,'Tue'], [3,'Wed'],[4,'Thur'],[5,'Fri'],[6,'Sat'],[7,'Sun']]; ?>
                		<?php
                		foreach ($weeks as $k => $week){
                			$week_num = $k+1;
                			$found = false;
                			foreach($attendances4 as $attendance){

                				if ($attendance->month == ($k+1) ){
                					$found = true;
                					echo"[$week_num,$attendance->total ],";
                				}
                			}

                			if (!$found){

                					echo "[$week_num,0],";

                			}
                		}

                		?>
                		];

                			$.plot('#demo-flot-bar2', [data], {
                					series: {
                							bars: {
                									show: true,
                									barWidth: 0.6,
                									fill: true,
                									fillColor: {
                											colors: [{
                													opacity: 0.9
                											}, {
                													opacity: 0.9
                											}]
                									}
                							}
                					},
                					colors: ['#9B59B6'],
                					yaxis: {
                							ticks: 5,
                							tickColor: 'rgba(0,0,0,.1)'
                					},
                					xaxis: {
                							ticks: 7,
                							tickColor: 'transparent'
                					},
                					grid: {
                							hoverable: true,
                							clickable: true,
                							tickColor: '#eeeeee',
                							borderWidth: 0
                					},
                					legend: {
                							show: true,
                							position: 'nw'
                					},
                					tooltip: {
                							show: true,
                							content: 'x: %x, y: %y'
                					}
                			});

                      /*
                        END ATTENDANCE DUMPED
                      */



//dump for collection ANALYSIS
















<?php// $months =  ['Jan', 'Feb', 'Mar','Apr','May','Jun','Jul','Aug','Sept','Oct','Now','Dec']; ?>
// MORRIS BAR CHART
// =================================================================
// Require MorrisJS Chart
// -----------------------------------------------------------------
// http://morrisjs.github.io/morris.js/
// =================================================================<?php /*
Morris.Bar({
  element: 'demo-morris-bar9',
  data: [
    <?php
    foreach ($months as $key => $value) {
      // code...
      $month = $key+1;
      $found = false;
      foreach ($collections3 as $collection) {
        // code...
        if($key+1 == $collection->month && ($collection->tithe != NULL && $collection->offering != NULL && $collection->other != NULL)){
          $found = true;
          echo "{y: '" .$value. "', a: " .$collection->tithe.", b: ".$collection->offering.", c: ".$collection->other."},";
        }
      }
      if(!$found){
        echo "{y: '" .$value. "', a: 0, b: 0, c: 0},";
      }

    } ?>
  ],
  xkey: 'y',
  ykeys: ['a', 'b', 'c'],
  labels: ['Tithe', 'Offering', 'Other'],
  gridEnabled: true,
  gridLineColor: 'rgba(0,0,0,.1)',
  gridTextColor: '#8f9ea6',
  gridTextSize: '11px',
  barColors: ['red', 'green', 'yellow'],
  resize:true,
  hideHover: 'auto'
});

//for week
<?php $days =  ['Mon', 'Tue', 'Wed','Thur','Fri','Sat','Sun']; ?>
Morris.Bar({
  element: 'demo-morris-bar95',
  data: [
    <?php
    foreach ($days as $key => $value) {
      // code...
      $day = $key+1;
      $found = false;
      foreach ($attendances4 as $collection) {
        // code...
        if($key+1 == $collection->day && ($collection->tithe != NULL && $collection->offering != NULL && $collection->other != NULL)){
          $found = true;
          echo "{y: '" .$value. "', a: " .$collection->tithe.", b: ".$collection->offering.", c: ".$collection->other."},";
        }
      }
      if(!$found){
        echo "{y: '" .$value. "', a: 0, b: 0, c: 0},";
      }

    } ?>
  ],
  xkey: 'y',
  ykeys: ['a', 'b', 'c'],
  labels: ['special offering', 'seed Offering', 'Offering'],
  gridEnabled: true,
  gridLineColor: 'rgba(0,0,0,.1)',
  gridTextColor: '#8f9ea6',
  gridTextSize: '11px',
  barColors: ['red', 'green', 'yellow'],
  resize:true,
  hideHover: 'auto'
});
*/?>

// end collection analysis
