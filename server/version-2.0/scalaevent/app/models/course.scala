package models

case class Course( name: String,
                 active: Boolean)

object JsonFormats {
  import play.api.libs.json.Json

  // Generates Writes and Reads for Feed and User thanks to Json Macros
  implicit val courseFormat = Json.format[Course]
}